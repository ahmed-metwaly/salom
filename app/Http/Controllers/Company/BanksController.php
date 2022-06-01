<?php

namespace App\Http\Controllers\Company;

use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BanksController extends Controller
{
    public function index()
    {
        $data = Bank::where('company_id', \Auth::user()->id)->get();

        return view('company.banks.index', compact('data'));
    }


    public function create()
    {
        return view('company.banks.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'bank_name' => 'required|max:255',
            'number' => 'required|max:50',
            'iban' => 'required|max:50',
            'owner_name' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('banks.create')->withErrors($validator)->withInput();
        }

        $data = new Bank();

        $data->company_id = \Auth::user()->id;
        $data->bank_name = $request->bank_name;
        $data->number = $request->number;
        $data->iban = $request->iban;
        $data->owner_name = $request->owner_name;

        return $data->save() ?
            redirect()->route('banks.index')->with('mOk', trans('messages.addOK')) :
            redirect()->route('banks.index')->with('mNo', trans('messages.addNo'))->withInput();
    }


    public function edit(Bank $bank)
    {
        if ( !$bank ){
            return view('errors.404');
        }

        return view('company.banks.edit', compact('bank'));
    }


    public function update(Request $request, $id)
    {

        $rules = [
            'bank_name' => 'required|max:255',
            'number' => 'required|max:50',
            'iban' => 'required|max:50',
            'owner_name' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('banks.edit', $id)->withErrors($validator)->withInput();
        }

        $data = Bank::find($id);

        $data->bank_name = $request->bank_name;
        $data->number = $request->number;
        $data->iban = $request->iban;
        $data->owner_name = $request->owner_name;

        return $data->save() ?
            redirect()->route('banks.index')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('banks.index')->with('mNo', trans('messages.updateFalse'))->withInput();

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $deleted = Bank::where('id', $id)->delete();
        $url = route('banks.index');

        return json_encode(['code' => $deleted, 'url' => $url]);
    }
}
