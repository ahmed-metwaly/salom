<?php

namespace App\Http\Controllers\Admin;

use App\ContactUsMessage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminMessagesController extends Controller
{

    public function getIndex() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = ContactUsMessage::with([
                                    'user' => function($query) {
                                        $query->select('id', 'name', 'user_type');
                                }])
                                ->orderBy('id', 'DESC')
                                ->get();

        return view('admin.admin_messages.showAll', ['data' => $data]);
    }


    public function getDetails($id) {

        $data = ContactUsMessage::with([
                                    'user' => function($query) {
                                        $query->select('id', 'name', 'user_type');
                                    }])
                                    ->where('id', $id)
                                    ->firstOrFail();

        if ( !$data ){
            return view('errors.404');
        }

        return view('admin.admin_messages.details', ['data' => $data]);

    }


    public function getDelete($id) {

        return ContactUsMessage::destroy($id) ?
            redirect()->route('admin-messages')->with('mOk', trans('admin.deleteOK')) :
            redirect()->route('admin-messages')->with('mNo', trans('admin.deleteNo'));


    }



}
