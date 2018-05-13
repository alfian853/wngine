<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Job;
use App\RegistrationsCompany                                                          ;
use App\Mail\Mailer;
use Session;
use Mail;
use Auth;
class CompanyController extends Controller
{
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
		$validator = $request->validate([
			'name' => 'required|min:4',
			'password' => 'required|min:8|confirmed',
			'email' => 'required|email',
			'address' => 'required|min:5',
			'telp' => 'required|min:8',
		]);

		//if ($validator->fails()) {
		//	return Redirect::back()->withErrors($validator);
		//}

		// Check company name and email
		$found_company = Company::where('c_name', $request->name)
							->orWhere('email', $request->email)->get();
		$found_registration_company = RegistrationsCompany::where('rgc_name', $request->name)
							->orWhere('rgc_email', $request->email)->get();

		if (count($found_company) != 0 || count($found_registration_company) != 0) {
			return Redirect::back()->withErrors([
				'name' => 'Either company name or email is currently used',
				'email' => 'Either company name or email is currently used',
			]);
		}

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

	public function postingJob(Request $request)
    {
		$company_id = Auth::guard('company')->user()->c_id;

		$request->validate([
			'name'				=>	'required',
			'finishDate' 		=>	'required|date_format:Y-m-d',
			'job_list'			=>	'required',
			'shortDescription'	=>	'required',
		]);

		$job = Job::create([
			'name'				=> $request->name,
			'description'		=> $request->shortDescription,
			'upload_date'		=> date('Y-m-d'),
			'finish_date'		=> $request->finishDate,
			'document'			=> 'dummyyy',
			'company_id'		=> $company_id,
		]);


		$skill_list = json_decode($request->job_list, true);
		foreach($skill_list as $s_id => $point)
		{
			DB::table('job_skills')
				->insert([
					'job_id'	=>	$job->id,
					'skill_id'	=>	$s_id,
					'point'		=>	$point,
				]);
		}

		return view('home');
    }

    public function showProfile()
    {
      return view('company.viewProfile');
    }
}
