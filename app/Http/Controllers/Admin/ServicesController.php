<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{

    public function getServices() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = Service::with([
                                'company' => function($query) {
                                    $query->select('id', 'name');
                            }])
//                            ->select('id', 'name', 'price', 'photo', 'interval', 'company_id')
                            ->orderBy('company_id')
                            ->get();
        $type = 'company';

        return view('admin.services.showAll', compact('data', 'type'));
    }

    public function getServiceDetails($id) {

        $data = Service::with([
                            'company' => function($query) {
                                $query->select('id', 'name');
                            }])
                            ->find($id);

        if ( !$data ){
            return view('errors.404');
        }

        return view('admin.services.details', ['data' => $data]);
    }

    public function changeStatus(Request $request) {

        $service = Service::find($request->serviceId);

        $service->has_blocked = $request->status;
        $service->save();

        return $service->save() ? '1' : '0';
    }
}