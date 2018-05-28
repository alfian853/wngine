<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\DB;
use App\Registrations;
use App\Mail\Mailer;
use Session;
use Mail;
use Validator;
use Auth;
use Storage;


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
    			'email' => 'required|email|unique:members|unique:company',
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

		function getMemberData($nickname){
			$user = DB::table('members')
			->select(
				'members.*',
				DB::raw('sum(member_points.point) as total_point'),
				DB::raw('GROUP_CONCAT(skills.name) as skill_name'),
				DB::raw('GROUP_CONCAT(skills.id) as skill_id'),
				DB::raw('GROUP_CONCAT(member_points.point) as skill_point')
			)
			->where('m_name','=',$nickname)
			->join('member_points','member_points.member_id','=','members.m_id')
			->join('skills','skills.id','=','member_points.skill_id')
			->first();
			$user->skills_name = preg_split("/,/",$user->skill_name);
			$user->skills_point = preg_split("/,/",$user->skill_point);
			$user->skills_id = preg_split("/,/",$user->skill_id);

			return $user;
		}

    public function showProfile()
    {
      return view('members.viewProfile')->with([
				'user' => self::getMemberData(Auth::guard('member')->user()->m_name)
			]);
    }

		public function showProfileById($nick)
    {
			dd(self::getMemberData($nick));
      return view('members.viewProfile');
    }

		public function updateProfilPict(Request $request){
			$request->validate([
					'file' => 'mimes:png,jpg,jpeg'
			]);
			if($request->file('file') != null){
				$path = Storage::putFile('public', $request->file('file'));
				$targetPath = date('Y-m-d-H-m-s').'-'.$request->file('file')->getClientOriginalName();
				$oldfile = DB::table('members')
				->select('members.m_image')
				->where('m_name','=',$request->nick)->first()->m_image;
				if($oldfile != null){
					Storage::delete('members_photo/'.$oldfile);
				}
				Storage::move($path,'members_photo/'.$targetPath);
				DB::table('members')
				->where('m_name','=',$request->nick)
				->update(['m_image' => $targetPath]);
				return response()->json([
					'status' => 'success',
					'newpath' => asset('members_photo').'/'.$targetPath
				]);
			}
		}

		public function updateName(Request $request){
			$data = json_decode($request->data_send,true);
			if($data['new_nickname'] != ""){
				DB::table('members')
				->where('m_id','=',Auth::guard('member')->user()->m_id)
				->update(['m_name' => $data['new_nickname'] ]);
				return response()->json([
					'status' => 'success',
					'message' => 'success change name'
				]);
			}
			else{
				return response()->json([
					'status' => 'failed',
					'message' => 'something wrong'
				]);
			}
		}

}
