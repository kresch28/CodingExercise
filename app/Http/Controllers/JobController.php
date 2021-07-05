<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\CompanyController;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        /*$data = DB::table('jobs')->get();
        dd($data);*/
        return view('index', ['jobs' => Job::with('company')->orderBy('published_at', 'DESC')->get()->toArray(), 'companies' => Company::all()->toArray()]);
    }

    public function addJob(Request $request){
       if($request->isMethod('post')){
            $title = $request->title;
            $description = $request->description;
            $location = $request->location;
            $company = $request->company;

            $add = DB::table('jobs')->insert([
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'company_id' => $company,
                'published_at' => now(),
                'updated_at' => now(),
            ]);

            if($add){
                return view('index', ['jobs' => Job::with('company')->orderBy('published_at', 'DESC')->get()->toArray(), 'companies' => Company::all()->toArray()]);

            }else{
                return "data not sent";
            }
        }
        return view('index', ['jobs' => Job::with('company')->orderBy('published_at', 'DESC')->get()->toArray(), 'companies' => Company::all()->toArray()]);
    }
}
