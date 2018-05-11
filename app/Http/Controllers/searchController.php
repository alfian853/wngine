<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    public function homeQuery(Request $request){
      // dd($request['query']);
      return redirect('google.com');
    }

    public function showJobSearch(){
      return view('job_search');
    }
}
