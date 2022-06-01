<?php

namespace App\Http\Controllers\Web;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    public function search(Request $request) {


        $request->validate([
            'city' => 'required',
            'service' => 'required'
        ]);

        $city_id = $request->city;

        $data = Service::where('name', 'LIKE', '%'.$request->service.'%')
                        ->whereHas('company', function ($q) use ($city_id) {
                            $q->where('city_id', $city_id);
                        })
                        ->paginate(6);

//        dd($request->date);

        return view('web.search.index', compact('data'));
    }
}