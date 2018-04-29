<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Registrations;
use App\Mail\Mailer;
use Session;
use Mail;

class MemberController extends Controller
{
    public function index() {
		return view('members.index');
	}

	public function register() {
		return view('members.register');
	}

  public function confirmRegistration(Request $request){
    $userRow = registrations::where('rg_token',$request->token)->take(1)->get();
    if(count($userRow) == 0){
      Session::flash('alert',"Invalid confirmation token!");
      Session::flash('alert-type','failed');
    }
    else{
      $userRow=$userRow[0];
      Member::create([
  			'm_name' => $userRow['rg_name'],
        		'm_email' => $userRow['rg_email'],
        		'm_borndate' => $userRow['rg_borndate'],
        		'm_address' => $userRow['rg_address'],
  			'm_password' => $userRow['rg_password'],
  			'm_telp' => $userRow['rg_telp'],
  		]);

      registrations::where('rg_token',$request->token)->delete();
      Session::flash('alert',"Registration complete, you can login now");
      Session::flash('alert-type','success');
    }

    return redirect('home');
  }

	public function createUser(Request $request) {
		$request->validate([
			'name' => 'required|min:4',
			'password' => 'required|min:8',
			'email' => 'required|email',
			'address' => 'required|min:5',
			'telp' => 'required|min:8',
			'tgllahir' => 'required|date_format:Y-m-d',
		]);


    $linkToken = sha1("ha".$request->email.((string)date("l h:i:s"))."sh");
    Registrations::create([
      'rg_email' => $request->email,
      'rg_name' => $request->name,
      'rg_token' => $linkToken,
      'rg_borndate' => $request->tgllahir,
      'rg_address' => $request->address,
      'rg_password' => sha1($request->password),
      'rg_telp' => $request->telp,
    ]);
    $mailObj = new Mailer();
    $mailObj->setRegistMail($request->name,$linkToken);
    Mail::to($request->email)->send($mailObj);

    Session::flash('alert','Please confirm the registration through email we sent to you');
    Session::flash('alert-type','success');
    return redirect('home');
		// Member::create([
		// 	'm_name' => $request->name,
		// 	'm_password' => $request->password,
		// 	'm_email' => $request->email,
		// 	'm_address' => $request->address,
		// 	'm_telp' => $request->telp,
		// 	'm_borndate' => $request->tgllahir,
		// ]);
  }

    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $task = Task::create(['title' => $request->title,'description' => $request->description]);
        return redirect('/tasks/'.$task->id);
    }
}
