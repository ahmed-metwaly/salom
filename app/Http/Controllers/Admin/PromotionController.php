<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{

    public function serviceIndex() {

        $promotions = Promotion::where('type', 1)->orderBy('id', 'DESC')->get();

        return view('admin.promotions.serviceIndex', compact('promotions'));
    }


    public function serviceAdd() {

        return view('admin.promotions.serviceAdd');
    }

    public function serviceDoAdd(Request $request) {
        
        $rules = [
            'promotionService' => 'required',
            'start_at' => 'required|unique:promotions',
            'end_at' => 'required|unique:promotions',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('promotions.service.add')->withErrors($validator)->withInput();
        }

        $promotion = new Promotion();
        $promotion->promotionable_id = $request->promotionService;
        $promotion->promotionable_type = 'App\Service';
        $promotion->type = 1;
        $promotion->start_at = $request->start_at;
        $promotion->end_at = $request->end_at;

        return $promotion->save() ?
        redirect()->route('promotions.service')->with('mOk', 'تمت الاضافة بنجاح') :
        redirect()->route('promotions.service')->with('mNo', 'حدث خطأ ما يرجي المحاوله مره اخري')->withInput();
        
    }


    public function serviceEdit($id) {

        $id = (int) $id;

        $data = Promotion::where('id', $id)->first();



        return view('admin.promotions.serviceEdit', compact('data'));
    }

    public function serviceUpdate(Request $request, $id) {

        $rules = [
            'promotionService' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('promotions.service.edit')->withErrors($validator)->withInput();
        }

        $id = (int) $id;

        $promotion = Promotion::where('id', $id)->first();

        if(!$promotion) {

            $promotion = new Promotion();
            $promotion->promotionable_id = $request->promotionService;
            $promotion->promotionable_type = 'App\Service';
            $promotion->type = 1;
            $promotion->start_at = $request->start_at;
            $promotion->end_at = $request->end_at;
        }
        else{
            $promotion->promotionable_id = $request->promotionService;
            $promotion->start_at = $request->start_at;
            $promotion->end_at = $request->end_at;
        }

        return $promotion->save() ?
            redirect()->route('promotions.service')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('promotions.service')->with('mNo', trans('messages.updateFalse'))->withInput();
    }

    public function serviceDelete($id) {

        return Promotion::where('id', $id)->delete() ? back()->with('mOk', trans('messages.deletedOk')) : back()->with('mNo', trans('messages.deletedNo'));
    }

    public function findServiceByName(Request $request) {

        $query = $request->q;

        $data = Service::where('name', 'LIKE', '%'.$query.'%')->with('company')->select('id', 'name', 'company_id')->get();

        $rows = [];
        foreach ($data as $value) {
            $rows[] = array(
                "id" => $value->id,
                'text' => $value->name .' .... '. $value->company->name
            );
        }

        return json_encode( $rows);
    }


    public function servicesIndex() {

        $promotions = Promotion::where('type', 2)->get();

        return view('admin.promotions.servicesIndex', compact('promotions'));
    }


    public function servicesCreate() {
        $services = Service::where('is_active', true)->get();

        return view('admin.promotions.servicesCreate', compact('services'));
    }

    public function servicesStore(Request $request) {

        $promotions = Promotion::where('type', 2)
                                ->where('is_active', true)
                                ->where('start_at',$request->start_at)
                                ->where('end_at',$request->end_at)
                                ->get();
        if($promotions->count() >= 3)
        {
            return redirect()->back()->with('mNo', 'لا يمكن اضافة خدمات راقية فى هذة المدة');
        }
        else{
            $promotion = new Promotion();
            $promotion->promotionable_id = $request->promotionable_id;  ;
            $promotion->promotionable_type = 'App\Service';
            $promotion->type = 2;
            $promotion->priority = $request->priority;
            $promotion->start_at = $request->start_at;
            $promotion->end_at = $request->end_at;
            $promotion->save();

            return redirect()->route('promotions.services')->with('mOk', trans('messages.addOK'));
        }
    }


    public function servicesEdit(Promotion $promotion) {



        $services = Service::where('is_active', true)->get();

        return view('admin.promotions.servicesEdit', compact('promotion', 'services'));
    }


    public function servicesUpdate(Request $request ,Promotion $promotion) {
        $promotions = Promotion::where('type', 2)
                                ->where('is_active', true)
                                ->where('start_at',$request->start_at)
                                ->where('end_at',$request->end_at)
                                ->get();
        if($promotions->count() >= 3)
        {
            return redirect()->back()->with('mNo', 'لا يمكن اضافة خدمات راقية فى هذة المدة');
        }

        else{
            $updated = $promotion->update($request->all());

            return $updated ?
                redirect()->route('promotions.services')->with('mOk', trans('messages.updateTrue')) :
                redirect()->route('promotions.services')->with('mNo', trans('messages.updateFalse'))->withInput();
         }   
    }


    public function companiesIndex() {

        $promotions = Promotion::where('type', 3)->get();

        return view('admin.promotions.companiesIndex', compact('promotions'));
    }


    public function companiesCreate() {

        $users = User::where('user_type',2)->where('admin_is_conf', true)->get();

        return view('admin.promotions.companiesCreate', compact('users'));
    }


    public function companiesStore(Request $request) {

        $promotions = Promotion::where('type', 3)
                                ->where('is_active', true)
                                ->where('start_at',$request->start_at)
                                ->where('end_at',$request->end_at)
                                ->get();
        if($promotions->count() >= 3)
        {
            return redirect()->back()->with('mNo', 'لا يمكن اضافة مركز مميز فى هذة المدة');
        }
        else{
            $promotion = new Promotion();
            $promotion->promotionable_id = $request->promotionable_id;  ;
            $promotion->promotionable_type = 'App\User';
            $promotion->type = 3;
            $promotion->priority = $request->priority;
            $promotion->start_at = $request->start_at;
            $promotion->end_at = $request->end_at;
            $promotion->save();
            
            return redirect()->route('promotions.companies')->with('mOk', trans('messages.addOK'));

        }
    }


    public function companiesEdit(Promotion $promotion) {

        $users = User::where('user_type',2)->where('admin_is_conf', true)->get();

        return view('admin.promotions.companiesEdit', compact('promotion','users'));
    }



    public function companiesUpdate(Request $request,Promotion $promotion) {

        $promotions = Promotion::where('type', 3)
                                ->where('is_active', true)
                                ->where('start_at',$request->start_at)
                                ->where('end_at',$request->end_at)
                                ->get();
        if($promotions->count() >= 3)
        {
        return redirect()->back()->with('mNo', 'لا يمكن اضافة خدمات راقية فى هذة المدة');
        }

        else{
        $updated = $promotion->update($request->all());

        return $updated ?
        redirect()->route('promotions.companies')->with('mOk', trans('messages.updateTrue')) :
        redirect()->route('promotions.companies')->with('mNo', trans('messages.updateFalse'))->withInput();
        }   
    }


    public function findCompanyByName(Request $request) {

        $query = $request->q;

        $data = User::where([ ['user_type', 2], ['status', true], ['conf_status', true], ['name', 'LIKE', '%'.$query.'%'] ])->select('id', 'name')->get();

        $rows = [];
        foreach ($data as $value) {
            $rows[] = array(
                "id" => $value->id,
                'text' => $value->name
            );
        }

        return json_encode( $rows);
    }
    public function destroy($id){

        return Promotion::where('id', $id)->delete()
            ? redirect()->back()->with('mOk', trans('admin.deleteOK'))
            : redirect()->back()->with('mNo', trans('admin.deleteNo'));
    }
   
}