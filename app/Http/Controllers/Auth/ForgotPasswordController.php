<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Mailer as Mailer;
use Mail;
use App\Member;
use App\Company;
use Illuminate\Foundation\Auth\User as User;
use Session;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the reset/forgot password request form
     *
     * @return view
     */
    public function showForm()
    {
        return view('password_reset');
    }

    /**
     * Handle email checking for reset password.
     * Determine which email belongs to what role.
     *
     * @param Illuminate\Http\Request $request
     * @return view
     */
    public function resetPass(Request $request)
    {
        $email = $request->email;

        if($user = Member::where('email', $email)->get()->first()) // if email belongs to Member
        {
            $this->doPasswordRequest($user, 'member');
            return redirect(route('home'));
        }
        else if($user = Company::where('email', $email)->get()->first()) // if email belongs to Company
        {
            $this->doPasswordRequest($user, 'company');
            return redirect(route('home'));
        }
        else
        {
            $request->session()->flash('alert', 'Email couldn\'t be found.');
            $request->session()->flash('alert-type', 'warning');

            return redirect(route('password_reset'));
        }
    }

    /**
     * Handle sending token to user requesting password reset.
     *
     * @param Illuminate\Foundation\Auth\User  $user
     * @param string  $role
     * @return void
     */
    protected function doPasswordRequest(User $user, string $role){
        $table_name = array(
            'company' => 'company_rpass',
            'member' => 'member_rpass',
        );
        $column_name = array(
            'company' => 'c_name',
            'member' => 'm_name',
        );
        $mailer_content = array(
            'company' => Mailer::$Company,
            'member' => Mailer::$Member,
        );

        $name = $column_name[$role];

        // Old reset token found, delete first
		if(count(DB::table($table_name[$role])->where('email', $user->email)->get())) {
			DB::table($table_name[$role])->where('email',$user->email)->delete();
		}

        $linkToken = sha1("ha".$user->email.((string)date("l h:i:s"))."sh");

        $mailObj = new Mailer();
        DB::table($table_name[$role])->insert(
           array('email' => $user->email, 'token' => $linkToken)
        );
        $mailObj->setResetPassMail(
            $user->email,
            $user->$name,
            $linkToken,
            $mailer_content[$role]
        );
        Mail::to($user->email)->send($mailObj);

        session()->flash('alert', 'Confirmation link sent, please check your inbox');
        session()->flash('alert-type','success');
    }

    /**
     * Show reset password form after token confirmation (Company)
     *
     * @param @param Illuminate\Http\Request $request
     * @return view
     */
     public function memberNewPwdForm(Request $request){
       $userRow = DB::table('member_rpass')->where('token',$request->token)->take(1)->get();
       if(count($userRow) == 0){
         Session::flash('alert-type','failed');
         Session::flash('alert',"Invalid token!");
         redirect('home');
       }
       else{
         return view('members.new_password');
       }
     }

    /**
     * Show reset password form after token confirmation (Company)
     *
     * @param @param Illuminate\Http\Request $request
     * @return view
     */
     public function companyNewPwdForm(Request $request){
       $userRow = DB::table('company_rpass')->where('token',$request->token)->take(1)->get();
       if(count($userRow) == 0){
         Session::flash('alert',"Invalid confirmation token!");
         Session::flash('alert-type','failed');
         return redirect('home');
       }
       else{
         return view('company.new_password');
       }
     }

     /**
      * Reseting password for member.
      *
      * @param @param Illuminate\Http\Request $request
      * @return view
      */
     public function doMemberPwdReset(Request $request){
        Member::where('email',$request->email)->update(['password' => bcrypt($request->password_1)]);
        DB::table('member_rpass')->where('email',$request->email)->delete();
        Session::flash('alert',"Password changed, you can login now");
        Session::flash('alert-type','success');
        return redirect('home');
     }

     /**
      * Reseting password for company.
      *
      * @param @param Illuminate\Http\Request $request
      * @return view
      */
     public function doCompanyPwdReset(Request $request){
       Company::where('email',$request->email)->update(['password' => bcrypt($request->password_1)]);
       DB::table('company_rpass')->where('email',$request->email)->delete();
       Session::flash('alert',"Password changed, you can login now");
       Session::flash('alert-type','success');
       return redirect('home');
     }

}
