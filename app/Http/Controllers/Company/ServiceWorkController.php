<?php

namespace App\Http\Controllers\Company;

use App\Day;
use App\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceWorkController extends Controller
{

    public function create($serviceId) {

        $days = Day::all();

        $hasWorkHours = Work::where([ ['workable_id', $serviceId], ['workable_type', 'App\Service'] ])->count();

        return $hasWorkHours > 0
            ? view('company.works.services.update', compact('days', 'serviceId'))
            : view('company.works.services.create', compact('days', 'serviceId'));
    }

    public function store(Request $request, $serviceId) {

        $request->validate([
            'days' => 'required',
        ]);

        foreach ($request->days as $key => $value) {

            $day = getShortDay($value);
            $dayRepeater = $request[$day];
            $created = NULL;

            foreach ($dayRepeater as $arr) {

                if($arr['time_from'] && $arr['time_to'] && $arr['orders_count_per_interval']) {

                    $created = $this->createWorkTime($value, $arr['time_from'], $arr['time_to'], $arr['orders_count_per_interval'], $serviceId, 'App\Service');
                }
            }
        }

        return redirect()->route('works.services.create', $serviceId)->with('mOk', trans('messages.addOK'));
            // : redirect()->route('works.services.create', $serviceId)->with('mNo', 'لا يمكن إضافة ساعات عمل فارغة');
    }

    public function update(Request $request, $serviceId) {

        $request->validate([
            'days' => 'required',
        ]);

//        dd($request->all());

        //delete-old-data....
        Work::where([ ['workable_id', $serviceId], ['workable_type', 'App\Service'] ])->delete();

        foreach ($request->days as $key => $value) {

            $day = getShortDay($value);
            $dayRepeater = $request[$day];
            $oldDayRepeater = $request['old'.$day];
            $created = NULL;

            if($oldDayRepeater) {

                foreach ($oldDayRepeater as $arr) {

                    if($arr['time_from'] && $arr['time_to'] && $arr['orders_count_per_interval']) {

                        $created = $this->createWorkTime($value, $arr['time_from'], $arr['time_to'], $arr['orders_count_per_interval'], $serviceId, 'App\Service');
                    }
                }
            }

            foreach ($dayRepeater as $arr) {
//                dd($dayRepeater);
//
                if( $arr['time_from'] && $arr['time_from'] != '0:00' && $arr['time_to'] && $arr['time_to'] != '0:00' && $arr['orders_count_per_interval']) {

                    $created = $this->createWorkTime($value, $arr['time_from'], $arr['time_to'], $arr['orders_count_per_interval'], $serviceId, 'App\Service');
                }
            }
        }

        return $created
            ? redirect()->route('works.services.create', $serviceId)->with('mOk', 'تم الاضافة او التعديل بنجاح')
            : redirect()->route('works.services.create', $serviceId)->with('mNo', 'لا يمكن إضافة إضافة ساعات عمل فارغة');
    }


    protected function createWorkTime($dayId, $timeFrom, $timeTo, $ordersCount, $userId, $type) {

        $created = Work::create([
            'day_id'                    => $dayId,
            'time_from'                 => $timeFrom,
            'time_to'                   => $timeTo,
            'workable_id'               => $userId,
            'workable_type'             => $type,
            'orders_count_per_interval' => $ordersCount
        ]);

        return $created;
    }

}
