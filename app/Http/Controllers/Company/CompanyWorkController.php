<?php

namespace App\Http\Controllers\Company;

use App\Day;
use App\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyWorkController extends Controller
{

    public function create() {

        $days = Day::all();

        $hasWorkHours = Work::where([ ['workable_id', \Auth::user()->id], ['workable_type', 'App\User'] ])->count();

        return $hasWorkHours > 0
            ? view('company.works.companies.update', compact('days'))
            : view('company.works.companies.create', compact('days'));
    }

    public function store(Request $request) {

        $request->validate([
            'days' => 'required',
        ]);

        foreach ($request->days as $key => $value) {

            $day = getShortDay($value);
            $dayRepeater = $request[$day];
            $created = NULL;

            foreach ($dayRepeater as $arr) {

                if($arr['time_from'] && $arr['time_to']) {

                    $created = $this->createWorkTime($value, $arr['time_from'], $arr['time_to'], \Auth::user()->id, 'App\User');
                }
            }
        }

        return $created
            ? redirect()->route('works.companies.create')->with('mOk', trans('messages.addOK'))
            : redirect()->route('works.companies.create')->with('mNo', 'لا يمكن إضافة وقت دوام فارغ');
    }

    public function update(Request $request) {

        $request->validate([
            'days' => 'required',
        ]);

    //delete-old-data....
        Work::where([ ['workable_id', \Auth::user()->id], ['workable_type', 'App\User'] ])->delete();

        foreach ($request->days as $key => $value) {

            $day = getShortDay($value);
            $dayRepeater = [];
            $dayRepeater = $request[$day];
            $oldDayRepeater = $request['old'.$day];
            $created = NULL;

            if($oldDayRepeater) {

                foreach ($oldDayRepeater as $arr) {

                    if($arr['time_from'] && $arr['time_to']) {

                        $created = $this->createWorkTime($value, $arr['time_from'], $arr['time_to'], \Auth::user()->id, 'App\User');
                    }
                }
            }

            foreach ($dayRepeater as $arr) {

                if( $arr['time_from'] && $arr['time_from'] != '0:00' && $arr['time_to'] && $arr['time_to'] != '0:00' ) {

                    $created = $this->createWorkTime($value, $arr['time_from'], $arr['time_to'], \Auth::user()->id, 'App\User');
                }
            }
        }

        return $created
            ? redirect()->route('works.companies.create')->with('mOk', 'تم الاضافة او التعديل بنجاح')
            : redirect()->route('works.companies.create')->with('mNo', 'لا يمكن إضافة وقت دوام فارغ');
    }

    public function delete(Request $request) {

        $deleted = Work::where('id', $request->id)->delete();

        return $deleted
            ? json_encode(['code' => $deleted])
            : json_encode(['code' => '2']);
    }


    protected function createWorkTime($dayId, $timeFrom, $timeTo, $userId, $type) {

        $created = Work::create([
            'day_id' => $dayId,
            'time_from' => $timeFrom,
            'time_to' => $timeTo,
            'workable_id' => $userId,
            'workable_type' => $type
        ]);

        return $created;
    }

}
