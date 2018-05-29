<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Job;
use App\Skill;
use App\RegistrationsCompany                                                          ;
use App\Mail\Mailer;
use Session;
use Mail;
use Auth;
use Storage;
use Validator;
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
			'email' => 'required|email|unique:company|unique:members',
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

    public function showProfile()
    {
        if(!Auth::guard('company')->check())
            return redirect(route('home'));

        $company = Company::find(Auth::guard('company')->user()->c_id);
        $job_list = Job::latest('id')
            ->select('id', 'name', 'description')
            ->where('company_id', $company->c_id)
            ->take(4)
            ->get();

        //dd($job_list);

        return view('company.viewProfile', [
            'company' => $company,
            'jobs' => $job_list,
        ]);
    }

    public function showProfileById(int $id)
    {
        $company = Company::find($id);

        if(!$company)
            return redirect(route('home'));

        $job_list = Job::latest('id')
            ->select('id', 'name', 'description')
            ->where('company_id', $company->c_id)
            ->take(4)
            ->get();

        //dd($job_list);

        return view('company.viewProfile', [
            'company' => $company,
            'jobs' => $job_list,
        ]);
    }

    public function updateProfilPict(Request $request){
			$request->validate([
					'file' => 'mimes:png,jpg,jpeg'
			]);
			if($request->file('file') != null){
				$path = Storage::putFile('public', $request->file('file'));
				$targetPath = date('Y-m-d-H-m-s').'-'.$request->file('file')->getClientOriginalName();
				$oldfile = DB::table('company')
				->select('company.c_image')
				->where('c_id','=',$request->id)->first()->c_image;
				if($oldfile != null){
					Storage::delete('company_photo/'.$oldfile);
				}
				Storage::move($path,'company_photo/'.$targetPath);
				DB::table('company')
				->where('c_id','=',$request->id)
				->update(['c_image' => $targetPath]);
				return response()->json([
					'status' => 'success',
					'newpath' => asset('company_photo').'/'.$targetPath
				]);
			}
		}
}
