<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jobController extends Controller
{
    public function homeQuery(Request $request){
      return redirect('google.com');
    }

    public function searchQuery(Request $request){
      return "ntaps";
    }

    public function showJobSearch(){
      return view('job.job_search');
    }

    public function showDescriptionJob(){
      return view('job.job_description');
    }

}
