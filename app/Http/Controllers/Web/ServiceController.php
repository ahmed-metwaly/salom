<?php

namespace App\Http\Controllers\Web;

use App\Rating;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Work;
use Vinkla\Hashids\Facades\Hashids;
use Carbon\Carbon;

class ServiceController extends Controller
{

//    public function index() {
//
//        $services = Service::where('is_active', true)->paginate(6);
//
//        dd($services);
//    }

    public function show($service) {

        $decodedId = Hashids::decode($service);

        $service = Service::find($decodedId[0]);

        if (!$service->is_active || $service->has_blocked) {
            abort('404');
        }

        $today = Carbon::today()->format('D');

    //    $isOpen = $service->days()->where('en_day', $today)->count();
        $isOpen = $service->works()
                        ->whereHas('day', function ($q) use($today){
                            $q->where('en_day', $today);
                        })
                        ->count();

        $workDay = Work::where('workable_id', $service->company_id)->where('workable_type', 'App\User')->get();

        return view('web.services.show', compact('service', 'isOpen', 'workDay'));
    }


    public function oneDay() {

        $data = Service::where('one_day', 1)->paginate(6);

        return view('web.services.oneDay', compact('data'));

    }


    public function findByName(Request $request) {

        $query = $request->q;

        $data = Service::where('name', 'LIKE', '%'.$query.'%')->select('id', 'name')->get();

        $rows = [];
        foreach ($data as $value) {
            $rows[] = array(
                "id" => $value->name,
                'text' => $value->name
            );
        }

        return json_encode( $rows);
    }

    public function rate(Request $request) {

        $rating = Rating::where([ ['user_id', $request->userId], ['rateable_id', $request->serviceId] ])->first();

        if($rating) {

            return $this->createOrChangeRating($request, 'update', $rating);
        }

        return $this->createOrChangeRating($request, 'create');
    }

    protected function createOrChangeRating($request, $method, $ratingObj = NULL) {

        if($method == 'create') {

            $created = Rating::create([
                'user_id' => $request->userId,
                'stars_count' => $request->ratingValue,
                'rateable_id' => $request->serviceId,
                'rateable_type' => 'App\Service'
            ]);

            $flag = $created->count() > 0 ? true : false;
        }
        else{

            $updated = $ratingObj->update([ 'stars_count' => $request->ratingValue, ]);

            $flag = $updated > 0 ? true : false;
        }

        return $flag
            ? json_encode(['code' => '1'])
            : json_encode(['code' => '0']);
    }

}
