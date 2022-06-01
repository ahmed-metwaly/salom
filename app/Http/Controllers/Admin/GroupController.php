<?php

namespace App\Http\Controllers\Admin;

use App\Groups;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class GroupController extends Controller {

	public function getIndex() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

		$data = Groups::join('users', 'groups.created_by' , '=', 'users.id' )->orderBy( 'groups.id','Desc' )->select('groups.*','users.id as user_id' ,'users.name as username')->get();

		$menu = menu();

//		dd($data);
		return view( 'admin.groups.showAll', [ 'data' => $data, 'menu' => $menu ] );
	}

	public function getAdd() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

		$data = menu();

		return view( 'admin.groups.add', [ 'data' => $data ] );

	}


	public function postAdd( Request $request ) {

		$rules = [
			'name' => 'required|min:3|max:255',
//            'items' => 'required|min:3|max:255',
		];


		$validator = Validator::make( $request->all(), $rules );

		if ( $validator->fails() ) {

			return redirect()->route( 'level-add' )->withErrors( $validator )->withInput();

		}

		$newGroup = new Groups();

        $newGroup->name       = $request->name;
        $newGroup->status     = 1;
		$newGroup->items      = json_encode( $request->items );
		$newGroup->created_by = Auth::user()->id;

		return $newGroup->save() ? redirect()->route( 'levels' )->with( 'mOk', trans( 'messages.addOK' ) ) : redirect()->route( 'levels' )->with( 'mNo', trans( 'messages.addNo' ) )->withInput();

	}


	public function getEdit( $id ) {

		$data = Groups::where( 'id', $id )->firstOrFail();

        if ( !$data ){
            return view('errors.404');
        }

		$groups = Groups::where( 'status', 1 )->orderBy( 'id', 'DESC' )->select( 'id', 'name' )->get();

		return view( 'admin.groups.edit', [ 'data' => $data, 'groups' => $groups ] );

	}


	public function postEdit( Request $request, $id ) {


		$rules = [
			'name' => 'required|min:3|max:255'
		];

		$validator = Validator::make( $request->all(), $rules );

		if ( $validator->fails() ) {

			return redirect()->route( 'level-edit', [ 'id' => $id ] )->withErrors( $validator )->withInput();

		}


		$data = Groups::find( $id );


		$data->name  = $request->name;
		$data->items = json_encode( $request->items );

		return $data->save() ? redirect()->route( 'level-edit', [ 'id' => $id ] )->with( 'mOk', trans( 'admin.editOK' ) ) : redirect()->route( 'level-edit', [ 'id' => $id ] )->with( 'mNo', trans( 'admin.editNo' ) )->withInput();


	}


	public function getDetails( $id ) {

		$data = Groups::where( 'id', $id )->firstOrFail();

        if ( !$data ){
            return view('errors.404');
        }

		$menu = menu();

		return view( 'admin.groups.details', [ 'data' => $data, 'menu' => $menu ] );

	}


	public function getDelete( $id ) {

		return Groups::destroy( $id ) ? redirect()->route( 'levels' )->with( 'mOk', trans( 'admin.deleteOK' ) ) : redirect()->route( 'levels' )->with( 'mNo', trans( 'admin.deleteNo' ) )->withInput();


	}


}
