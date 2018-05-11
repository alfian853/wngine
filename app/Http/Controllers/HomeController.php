<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd(Auth::user());
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::guard('company')->check()){
        return view('home',['user' => 'company']);
      }
      else if(Auth::guard('member')->check()){
        return view('home',['user' => 'member']);
      }
      else{
        return view('home',['user' => 'guest']);
      }
    }
}
