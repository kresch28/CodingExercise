<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CompanyController;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        /*$data = DB::table('jobs')->get();
        dd($data);*/
        return view('index', ['jobs' => Job::with('company')->get()->toArray(), 'companies' => Company::all()->toArray()]);
    }
}
