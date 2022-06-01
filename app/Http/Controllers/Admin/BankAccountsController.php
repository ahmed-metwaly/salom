<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Bank_account;
use App\Bank_transfer;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BankAccountsController extends Controller
{

    public function companiesBanks() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = Bank::where('type', 2)->orderBy('company_id')->get();

        return view('admin.bank_account.showAll', ['data' => $data]);
    }

    public function index() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = Bank::where('type', 1)->get();

        return view('admin.bank_account.index', ['data' => $data]);
    }

    public function create() {

        return view('admin.bank_account.create');
    }

    public function store(Request $request) {

        $rules = [
            'bank_name'  => 'required|max:255',
            'number'   => 'required|max:100' ,
            'iban'   => 'required|max:255',
            'owner_name' => 'required|max:255',
        ];

        $validator = Validator::make( $request->all(), $rules );

        if ( $validator->fails() ) {
            return redirect()->route( 'admin.banks.create' )->withErrors( $validator )->withInput();
        }

        $newBank = new Bank();
        $newBank->bank_name     = $request->bank_name;
        $newBank->number        = $request->number;
        $newBank->iban          = $request->iban;
        $newBank->owner_name    = $request->owner_name;
        $newBank->type          = 1;

        return $newBank->save()
            ?  redirect()->route('admin.banks.index')->with('mOk', trans('messages.addOK'))
            : redirect()->route('admin.banks.index')->with('mNo', trans('messages.addNo'))->withInput();
    }

    public function edit(Bank $bank) {

        return view( 'admin.bank_account.edit',compact('bank') );
    }

    public function update( Request $request, $id ) {

        $rules = [
            'bank_name'  => 'required|max:255',
            'number'   => 'required|max:100' ,
            'iban'   => 'required|max:255',
            'owner_name' => 'required|max:255',
        ];

        $validator = Validator::make( $request->all(), $rules );

        if ( $validator->fails() ) {
            return redirect()->route( 'admin.banks.edit', $id)->withErrors( $validator )->withInput();
        }

        $data = Bank::find( $id );
        $data->bank_name     = $request->bank_name;
        $data->number        = $request->number;
        $data->iban          = $request->iban;
        $data->owner_name    = $request->owner_name;
        $data->type          = 1;

        return $data->save()
            ?  redirect()->route('admin.banks.index')->with('mOk', trans('messages.updateTrue'))
            : redirect()->route('admin.banks.index')->with('mNo', trans('messages.updateFalse'))->withInput();
    }


    public function destroy($id){

        return Bank::where('id', $id)->delete()
            ? redirect()->route('admin.banks.index')->with('mOk', trans('admin.deleteOK'))
            : redirect()->route('admin.banks.index')->with('mNo', trans('admin.deleteNo'));
    }

}
