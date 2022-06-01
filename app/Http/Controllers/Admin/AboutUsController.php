<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\SiteData;

class AboutUsController extends Controller
{
    
    public function index() {

        $data = SiteData::where('type', 1)
                        ->select('id', 'type', 'icon', 'title', 'description')
                        ->get();

        $type = 1;

        return view('admin.site_data.showAll', compact('data', 'type'));
    }

    public function show($id) {

        $data = SiteData::find($id);

        if ( !$data ){
            return view('errors.404');
        }

        return view('admin.site_data.show', ['data' => $data]);
    }

    public function add() {

        $type = 1;

        return view('admin.site_data.add', compact('type'));
    }

    public function create(Request $request) {

        $rules = [
            'icon' => 'required|mimes:jpg,jpeg,png,tiff',
            'title' => 'required|max:255',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('about-add')->withErrors($validator)->withInput();
        }

        $data = new SiteData();

        if (isset($request->icon) && $request->icon != '') {
            $data->icon = uploading($request->file('icon'), 'site_data');
        }
        else {
            $data->icon = '';
        }

        $data->title = $request->title;
        $data->description = $request->description;
        $data->type = $request->type;

        return $data->save() ?
            redirect()->route('about-add')->with('mOk', trans('messages.addOK')) :
            redirect()->route('about-add')->with('mNo', trans('messages.addNo'))->withInput();
    }

    public function edit($id) {

        $data = SiteData::find($id);

        if ( !$data ){
            return view('errors.404');
        }

        return view('admin.site_data.edit', compact('data'));
    }

    public function update(Request $request, $id) {

        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('about-edit', ['id', $id])->withErrors($validator)->withInput();
        }

        $data = SiteData::find($id);

        if (isset($request->icon) && $request->icon != '') {

            $rules2 = array('icon' => 'mimes:jpg,jpeg,png,tiff');
            $validator2 = Validator::make(array('icon'=> $request->icon), $rules2);

            if($validator2->fails()) {
                return redirect()->route('about-edit', $id)->withErrors($validator2);
            }

            unlink(base_path('uploads/site_data') . DIRECTORY_SEPARATOR . $data->icon);

            $data->icon = uploading($request->file('icon'), 'site_data');
        }

        $data->title = $request->title;
        $data->description = $request->description;

        return $data->save() ?
            redirect()->route('about')->with('mOk', trans('messages.updateTrue')) :
            redirect()->route('about')->with('mNo', trans('messages.updateFalse'))->withInput();
    }

    public function delete($id) {

        $data = SiteData::find($id);

        if (isset($data->icon) && $data->icon != '') {

            unlink(base_path('uploads/site_data') . DIRECTORY_SEPARATOR . $data->icon);
        }

        return $data->delete() ?
            redirect()->route('about')->with('mOk', trans('admin.deleteOK')) :
            redirect()->route('about')->with('mNo', trans('admin.deleteNo'));
    }
}