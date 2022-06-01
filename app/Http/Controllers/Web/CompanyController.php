<?php

namespace App\Http\Controllers\Web;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;

class CompanyController extends Controller
{

    public function index() {

        $companies = User::where([ ['user_type', 2], ['status', true], ['conf_status', true] ])->paginate(12);

        return view('web.companies.index', compact('companies'));
    }

    public function show($companyId) {

        $decodedId = Hashids::decode($companyId);

        $company = User::find($decodedId[0]);

//        dd($company->works);
        return view('web.companies.show', compact('company'));
    }

    public function companiesServices($companyId) {

        $decodedId = Hashids::decode($companyId);

        count($decodedId)
            ? $services = Service::where('company_id', $decodedId[0])->paginate(6)
            : abort('404');

        $company = User::where('id', $decodedId[0])->select('id', 'name')->first();

        return view('web.companies.company_services', compact('services', 'company'));
    }
}
