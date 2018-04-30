<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\RegistrationsCompany                                                          ;
use App\Mail\Mailer;
use Session;
use Mail;

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
	
    public function confirmRegistration(Request $request)
    {
	    
    }
	
    public function createCompany(Request $request)
    {
	
    }
    
    public function store(Request $request)
    {

    }
}
