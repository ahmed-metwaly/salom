<?php

namespace App\Http\Controllers\Company;

use App\Day;
use App\Orders;
use App\Payment;
use App\Service;
use App\Work;
use App\WorkTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ServicesController extends Controller
{

    public function index()
    {
        $data = Service::where('company_id', \Auth::user()->id)->get();

        return view('company.services.index', compact('data'));
    }

    public function show(Service $service) {

        if ( !$service ){
            return view('errors.404');
        }

        // $workHours = Work::where([ ['workable_id', $service->id], ['workable_type', 'App\Service'] ])->get();

        return view('company.services.show', compact('service', 'workHours'));
    }

    public function create(){

        $days = Day::all();

        return view('company.services.create', compact('days'));
    }

    public function store(Request $request)
    {
        $rules = [
            'photo' => 'required|mimes:jpg,jpeg,png,tiff',
            'name' => 'required|max:255',
            'interval' => 'required|numeric',
            'price' => 'required|numeric',
//            'orders_count_per_day' => 'required|numeric',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('services.create')->withErrors($validator)->withInput();
        }

        $data = new Service();

        if ( isset($request->photo) && $request->photo ) {

            $data->photo = newUploading($request->file('photo'), '/uploads/services');
        }
        else {
            $data->photo = '';
        }



        $is_home = $request->is_home ? true : false;

        $data->company_id = \Auth::user()->id;
        $data->name = $request->name;
        $data->interval = $request->interval;
        $data->price = $request->price;
        $data->one_day = $request->one_day ? 1 : 0;
//        $data->orders_count_per_day = $request->orders_count_per_day;
        $data->description = $request->description;
        $data->is_home = $is_home;
        $data->save();

//        $data->days()->sync($request->days);

        return $data->save()
            ? redirect('/companyDashboard/services')->with('mOk', 'تم إضافة الخدمة بنجاح')
            : redirect()->route('services.create')->with('mNo', trans('messages.addNo'))->withInput();
    }


    public function edit(Service $service){

        $days = Day::all();

        return view('company.services.edit', compact('service', 'days'));
    }


    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|max:255',
            'interval' => 'required|numeric',
            'price' => 'required|numeric',
//            'orders_count_per_day' => 'required|numeric',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('services.edit', $id)->withErrors($validator)->withInput();
        }

        $data = Service::find($id);

        if (isset($request->photo) && $request->photo != '') {

            $rules2 = array('photo' => 'mimes:jpg,jpeg,png,tiff');
            $validator2 = Validator::make(array('photo'=> $request->photo), $rules2);

            if($validator2->fails()) {
                return redirect()->route('services.edit', $id)->withErrors($validator2)->withInput();
            }

            @unlink(public_path('uploads/services/') . $data->photo);

            $data->photo = newUploading($request->file('photo'), '/uploads/services');
        }

        $is_home = $request->is_home ? true : false;
        $one_day = $request->one_day ? 1 : 0;

        $data->name = $request->name;
        $data->interval = $request->interval;
        $data->price = $request->price;
//        $data->orders_count_per_day = $request->orders_count_per_day;
        $data->description = $request->description;
        $data->is_home = $is_home;
        $data->one_day = $one_day;

//        $data->days()->sync($request->days);

        return $data->save() ?
            redirect()->route('services.index')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('services.index')->with('mNo', trans('messages.updateFalse'))->withInput();

    }

    public function checkReserved(Request $request) {

        $id = $request->id;
        $service = Service::where('id', $id)->first();

        $currentOrdersCount = Orders::where('service_id', $service->id)
            ->whereDate('date', '>=', Carbon::today()->toDateString())
            ->whereHas('payment', function ($q) {
            })->count();

        return $currentOrdersCount > 0
            ? json_encode(['code' => '0', 'title' => 'حذف هذه الخدمة غير ممكن', 'message' => 'لا يمكن حذف هذه الخدمة لأنها محجوزة'])
            : json_encode(['code' => '1', 'title' => 'هل أنت متأكد من الحذف', 'message' => 'بحذف هذه الخدمة سيتم حذف جميع الحجوزات التي تمت لهذه الخدمة']);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Service::where('id', $id)->first();

        $url = route('services.index');

        if (isset($data->photo) && $data->photo != '') {
            @unlink(public_path('uploads/services/') . $data->photo);
        }

//        $data->days()->detach();
        $data->works()->delete();

        $deleted = $data->delete();

        return $deleted
            ? json_encode(['code' => $deleted, 'url' => $url])
            : json_encode(['code' => '2']);
    }

    public function getServiceWorkTimes(Service $service) {

//        $days = Day::all();
        $days = $service->days;

        $hasWorkHours = WorkTime::where('service_id', $service->id)->count();

        return view('company.services.service_work_times', compact('days', 'service', 'hasWorkHours'));
    }

    public function postServiceWorkTimes(Request $request, $serviceId) {

        $daysArr = $request->days;
        $fromArr = $request->time_from;
        $toArr = $request->time_to;

        return $this->createServiceWorkTime($daysArr, $fromArr, $toArr, $serviceId,'create');
    }

    public function updateServiceWorkTimes(Request $request, $serviceId) {

        $daysArr = $request->days;
        $fromArr = $request->time_from;
        $toArr = $request->time_to;

        return $this->createServiceWorkTime($daysArr, $fromArr, $toArr, $serviceId, 'update');
    }

    public function getServiceWorkDays(Service $service) {

        $days = Day::all();

        return view('company.services.service_work_days', compact('days', 'service'));
    }

    public function postServiceWorkDays(Request $request, Service $service) {

        $rules = [
            'days' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('services.days.create', $service->id)->withErrors($validator)->withInput();
        }

        $service->days()->sync($request->days);

        return $service->save() ?
            redirect()->route('services.index')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('services.index')->with('mNo', trans('messages.updateFalse'))->withInput();
    }

    public function changeStatus(Request $request) {

        $id = $request->id;
        $status = $request->status;

        $data = Service::where('id', $id)->first();
        $data->is_active = $status;
        $data->save();

        $flag = $data->save() ? true : false;

        $url = route('services.index');

        return json_encode(['code' => $flag, 'url' => $url]);
    }


    protected function createServiceWorkTime($daysArr, $fromArr, $toArr, $serviceId, $action) {

        if( $daysArr && $fromArr & $toArr ) {

            $savedFlag = false;

        //delete-old-if-update....
            if( $action == 'update') {

                WorkTime::where('service_id', $serviceId)->delete();
            }

            foreach ($daysArr as $key => $value) {

                if($fromArr[$key] != '0:00' && $toArr[$key] != '0:00') {

                    $savedFlag = true;

                    $data = new WorkTime();
                    $data->service_id = $serviceId;
                    $data->day_id = $value;
                    $data->time_from = $fromArr[$key];
                    $data->time_to = $toArr[$key];
                    $data->save();
                }
            }

            return $savedFlag ?
                redirect()->route('services.index')->with('mOk', trans('messages.addWorkTimeOK')) :
                redirect()->route('services.index')->with('mNo', trans('messages.addWorkTimeNo'));
        }

        return redirect()->route('services.index')->with('mNo', trans('messages.addWorkTimeNo'));
    }

}
