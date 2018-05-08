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
      $userRow = RegistrationsCompany::where('rgc_token',$request->token)->take(1)->get();
      if(count($userRow) == 0){
        Session::flash('alert',"Invalid confirmation token!");
        Session::flash('alert-type','failed');
      }
      else{
        $userRow=$userRow[0];
        Company::create([
          'c_name' => $userRow['rgc_name'],
              'email' => $userRow['rgc_email'],
              'c_address' => $userRow['rgc_address'],
          'password' => $userRow['rgc_password'],
          'c_telp' => $userRow['rgc_telp']
        ]);

        RegistrationsCompany::where('rgc_token',$request->token)->delete();
        Session::flash('alert',"Registration complete, you can login now");
        Session::flash('alert-type','success');
      }

      return redirect('home');
    }

    public function requestMailVerification(Request $request)
    {
      $request->validate([
        'name' => 'required|min:4',
        'password' => 'required|min:8|confirmed',
        'email' => 'required|email',
        'address' => 'required|min:5',
        'telp' => 'required|min:8',
        //'tgllahir' => 'required|date_format:Y-m-d',
      ]);

      $linkToken = sha1("ha".$request->email.((string)date("l h:i:s"))."sh");
      RegistrationsCompany::create([
        'rgc_email' => $request->email,
        'rgc_name' => $request->name,
        'rgc_token' => $linkToken,
        'rgc_address' => $request->address,
        'rgc_password' => bcrypt($request->password),
        'rgc_telp' => $request->telp
      ]);
      $mailObj = new Mailer();
      $mailObj->setRegistMail($request->name,$linkToken,Mailer::$Company);
      Mail::to($request->email)->send($mailObj);

      Session::flash('alert','Please confirm the registration through email we sent to you');
      Session::flash('alert-type','success');
      return redirect('home');

    }

    public function store(Request $request)
    {

    }

    public function showPostingJobForm()
    {
      return view('company.postingJob');
    }

    public function postingJobValidation()
    {
      return;
    }
}
