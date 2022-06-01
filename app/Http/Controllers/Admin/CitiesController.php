<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\City;

class CitiesController extends Controller
{

    public function index(){

        $data = City::get();

        return view('admin.cities.showAll', compact('data'));
    }

    public function create(){

        return view('admin.cities.add');
    }

    public function store(Request $request){

        $rules = [
            'city' => 'required|min:3|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('cities.create')->withErrors($validator)->withInput();
        }

        $data = City::create($request->all());

        return $data->save() ?
            redirect()->route('cities.index')->with('mOk', trans('messages.addOK')) :
            redirect()->route('cities.index')->with('mNo', trans('messages.addNo'))->withInput();
    }

    public function edit(City $city){

        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, City $city) {

        $rules = [
            'city' => 'required|min:3|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('cities.edit', $city->id)->withErrors($validator)->withInput();
        }

        $updated = $city->update($request->all());

        return $updated ?
            redirect()->route('cities.index')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('cities.index')->with('mNo', trans('messages.updateFalse'))->withInput();
    }

    public function destroy($id){

    //check-if-city-assigned-to-users.....
        $usersCount = User::where('city_id', $id)->count();

        if( $usersCount > 0) {
            return back()->with('mNo', 'لا يمكن حذف المدينة لوجود مستخدمين بها, يمكنك التعديل فقط');
        }

        return City::where('id', $id)->delete() ?
            back()->with('mOk', trans('messages.deletedOk')) :
            back()->with('mNo', trans('messages.deletedNo'));

    }

}
