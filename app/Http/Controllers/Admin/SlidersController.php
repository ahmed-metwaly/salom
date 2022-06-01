<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Slider;

class SlidersController extends Controller
{

    public function index() {

        $data = Slider::select('id', 'image')->get();

        return view('admin.slider.showAll', compact('data'));
    }


    public function add() {

        return view('admin.slider.add');
    }

    public function create(Request $request) {

        $rules = [
            'image' => 'required|mimes:jpg,jpeg,png,tiff',
            'url' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('sliders-add')->withErrors($validator)->withInput();
        }

        $data = new Slider();

        if ( isset($request->image) && $request->image != '' ) {

            $data->image = newUploading($request->file('image'), '/uploads/slider');
        }

        $data->url = $request->url;

        return $data->save() ?
            redirect()->route('sliders')->with('mOk', trans('messages.addOK')) :
            redirect()->route('sliders')->with('mNo', trans('messages.addNo'))->withInput();
    }

    public function edit($id) {

        $data = Slider::find($id);

        return view('admin.slider.edit', compact('data'));
    }

    public function update(Request $request, $id) {

        $rules = [
            'image' => 'mimes:jpg,jpeg,png,tiff',
            'url' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('sliders-edit', $id)->withErrors($validator);
        }

        $data = Slider::find($id);

        if (isset($request->image) && $request->image != '') {

            @unlink(public_path('uploads/slider/') . $data->image);

            $data->image = newUploading($request->file('image'), '/uploads/slider');
        }

        $data->url = $request->url;

        return $data->save() ?
            redirect()->route('sliders')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('sliders')->with('mNo', trans('messages.updateFalse'))->withInput();
    }


    public function delete($id) {

        $data = Slider::find($id);

        if ( isset($data->image) && $data->image != '' ) {

            @unlink(public_path('uploads/slider/') . $data->image);
        }

        return $data->delete() ?
            redirect()->route('sliders')->with('mOk', trans('admin.deleteOK')) :
            redirect()->route('sliders')->with('mNo', trans('admin.deleteNo'));
    }

}