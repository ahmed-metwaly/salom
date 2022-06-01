<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Operation;

class OperationController extends Controller
{

    public function index() {

        $data = Operation::get();

        return view('admin.operations.index', compact('data'));
    }

    public function create(){

        return view('admin.operations.create');
    }

    public function store(Request $request){

        $rules = [
            'company_id' => 'required',
            'price' => 'required|numeric',
            'operation_type' => 'required|in:1,2',
            'reason' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('operations.create')->withErrors($validator)->withInput();
        }

        $request['user_id'] =\Auth::user()->id;

        $data = Operation::create($request->all());

        return $data->save() ?
            redirect()->route('operations.index')->with('mOk', trans('messages.addOK')) :
            redirect()->route('operations.index')->with('mNo', trans('messages.addNo'))->withInput();
    }

    public function edit(Operation $operation){

        return view('admin.operations.edit', compact('operation'));
    }

    public function update(Request $request, Operation $operation) {

        $rules = [
            'company_id' => 'required',
            'price' => 'required|numeric',
            'operation_type' => 'required|in:1,2',
            'reason' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('operations.edit', $operation->id)->withErrors($validator)->withInput();
        }

        $request['user_id'] =\Auth::user()->id;

        $updated = $operation->update($request->all());

        return $updated ?
            redirect()->route('operations.index')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('operations.index')->with('mNo', trans('messages.updateFalse'))->withInput();
    }

    public function destroy($id){

        return Operation::where('id', $id)->delete() ?
            back()->with('mOk', trans('messages.deletedOk')) :
            back()->with('mNo', trans('messages.deletedNo'));

    }
}