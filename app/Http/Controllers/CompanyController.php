<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
	return view('company.index');
    }

    public function register()
    {
	return view('company.register');
    }
}
