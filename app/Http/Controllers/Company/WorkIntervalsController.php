<?php

namespace App\Http\Controllers\Company;

use App\WorkInterval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WorkIntervalsController extends Controller
{

    public function index() {

        $data = WorkInterval::where('company_id', \Auth::user()->id)->first();

        return view('company.work_intervals.index', compact('data'));
    }

    public function updateOrCreate(Request $request) {

        $rules = [
            'work_day' => 'required|min:3|max:255',
            'work_time' => 'required|min:3|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('work_intervals.index')->withErrors($validator)->withInput();
        }

        $companyId = \Auth::user()->id;

        $exists = WorkInterval::where('company_id', $companyId)->first();

        if($exists) {

            $data = $exists->update($request->all());
        }
        else{

            $request['company_id'] = $companyId;

            $data = WorkInterval::create($request->all());
        }

        return $data ?
            redirect()->route('work_intervals.index')->with('mOk', trans('messages.addOrUpdateOK')) :
            redirect()->route('work_intervals.index')->with('mNo', trans('messages.addOrUpdateNo'))->withInput();
    }
}
