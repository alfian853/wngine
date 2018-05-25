<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Registrations;
use App\Mail\Mailer;
use Session;
use Mail;
use Validator;
use Auth;

class MemberController extends Controller
{
	public function register() {
		return view('members.register');
	}

  public function confirmRegistration(Request $request){
    $userRow = Registrations::where('rg_token',$request->token)->take(1)->get();
    if(count($userRow) == 0){
      Session::flash('alert',"Invalid confirmation token!");
      Session::flash('alert-type','failed');
    }
    else{
      $userRow=$userRow[0];
      // dd($userRow['rg_email']);
      Member::create([
  			   'm_name' => $userRow['rg_name'],
        	 'email' => $userRow['rg_email'],
        	 'm_borndate' => $userRow['rg_borndate'],
        	 'm_address' => $userRow['rg_address'],
  			   'password' => $userRow['rg_password'],
  			   'm_telp' => $userRow['rg_telp']
  		]);

      Registrations::where('rg_token',$request->token)->delete();
      Session::flash('alert',"Registration complete, you can login now");
      Session::flash('alert-type','success');
    }

    return redirect('home');
  }

	public function requestMailVerification(Request $request) {
		$time = strtotime("-18 year", time());
		$date = date("Y-m-d", $time);

		Validator::make($request->all(),[
			'name' => 'required|min:4',
			'password' => 'required|min:8|confirmed|strong_pwd',
			'password_confirmation' => 'same:password',
			'email' => 'required|email|unique:members',
			'address' => 'required|min:10',
			'telp' => 'required|phone_number',
			'tgllahir' => 'required|date_format:Y-m-d|before:'.$date,
		],
		[
			'tgllahir.before' => 'your age must atleast 18 years old'
		]
	)->validate($request->all());


    $linkToken = sha1("ha".$request->email.((string)date("l h:i:s"))."sh");
    Registrations::create([
      'rg_email' => $request->email,
      'rg_name' => $request->name,
      'rg_token' => $linkToken,
      'rg_borndate' => $request->tgllahir,
      'rg_address' => $request->address,
      'rg_password' => bcrypt($request->password),
      'rg_telp' => $request->telp,
    ]);
    $mailObj = new Mailer();
    $mailObj->setRegistMail($request->name,$linkToken,Mailer::$Member);
    Mail::to($request->email)->send($mailObj);

    Session::flash('alert','Please confirm the registration through email we sent to you');
    Session::flash('alert-type','success');
    return redirect('home');

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

    public function showProfile()
    {
      return view('members.viewProfile');
    }

		public function showProfileById($id_member)
    {
      return view('members.viewProfile');
    }
}
