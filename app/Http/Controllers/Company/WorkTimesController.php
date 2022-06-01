<?php

namespace App\Http\Controllers\Company;

use App\WorkTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WorkTimesController extends Controller
{
    public function index()
    {
        $data = WorkTime::where('company_id', \Auth::user()->id)->get();

        return view('company.work_times.index', compact('data'));
    }


    public function create()
    {
        return view('company.work_times.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'day' => 'required|max:15',
            'time_from' => 'required',
            'time_to' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('work_times.create')->withErrors($validator)->withInput();
        }

        $data = new WorkTime();

        $data->company_id = \Auth::user()->id;
        $data->day = $request->day;
        $data->time_from = $request->time_from;
        $data->time_to = $request->time_to;

        return $data->save() ?
            redirect()->route('work_times.index')->with('mOk', trans('messages.addOK')) :
            redirect()->route('work_times.index')->with('mNo', trans('messages.addNo'))->withInput();
    }


    public function edit(WorkTime $workTime)
    {

        if ( !$workTime ){
            return view('errors.404');
        }

        return view('company.work_times.edit', compact('workTime'));
    }


    public function update(Request $request, $id)
    {

        $rules = [
            'day' => 'required|max:15',
            'time_from' => 'required',
            'time_to' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('work_times.edit', $id)->withErrors($validator)->withInput();
        }

        $data = WorkTime::find($id);

        $data->day = $request->day;
        $data->time_from = $request->time_from;
        $data->time_to = $request->time_to;

        return $data->save() ?
            redirect()->route('work_times.index')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('work_times.index')->with('mNo', trans('messages.updateFalse'))->withInput();

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $deleted = WorkTime::where('id', $id)->delete();
        $url = route('work_times.index');

        return json_encode(['code' => $deleted, 'url' => $url]);
    }
}
