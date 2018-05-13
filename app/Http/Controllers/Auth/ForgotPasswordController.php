<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Mailer as Mailer;
use Mail;
use App\Member;
use App\Company;
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

     public function memberPwdForm(){
       return view("members.reset");
     }

     public function companyPwdForm(){
       return view("company.reset");
     }

     public function doMemberPwdRequest(Request $request){

       $userRow = Member::where('email',$request->email)->take(1)->get();
       if(count($userRow) == 0){
         Session::flash('alert',"Email not registered");
         Session::flash('alert-type','warning');
         return redirect(route('member.password.request'));
       }
       else {
		// Old reset token found, delete first
		if(count(DB::table('member_rpass')->where('email', $request->email)->get())) {
			DB::table('member_rpass')->where('email',$request->email)->delete();
		}

         $linkToken = sha1("ha".$request->email.((string)date("l h:i:s"))."sh");
         $userRow = $userRow[0];
         $mailObj = new Mailer();
         DB::table('member_rpass')->insert(
           array('email' => $request->email, 'token' => $linkToken)
         );
         $mailObj->setResetPassMail($request->email,$userRow['m_name'],$linkToken,Mailer::$Member);
         Mail::to($request->email)->send($mailObj);
         Session::flash('alert','Please check your email');
         Session::flash('alert-type','success');
         return redirect(route('member.password.request'));
       }
     }

     public function doCompanyPwdRequest(Request $request){
       $userRow = Company::where('email',$request->email)->take(1)->get();
       if(count($userRow) == 0){
         Session::flash('alert',"Email not registered");
         Session::flash('alert-type','warning');
       }
       else{
		// Old reset token found, delete first
		if(count(DB::table('company_rpass')->where('email', $request->email)->get())) {
			DB::table('company_rpass')->where('email',$request->email)->delete();
		}

         $linkToken = sha1("ha".$request->email.((string)date("l h:i:s"))."sh");
         $userRow = $userRow[0];
         $mailObj = new Mailer();
         DB::table('company_rpass')->insert(
           array('email' => $request->email, 'token' => $linkToken)
         );
         $mailObj->setResetPassMail($request->email,$userRow['m_name'],$linkToken,Mailer::$Company);
         Mail::to($request->email)->send($mailObj);
         Session::flash('alert','Please check your email');
         Session::flash('alert-type','success');
         return redirect('home');
       }
     }

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

     public function doMemberPwdReset(Request $request){
        Member::where('email',$request->email)->update(['password' => bcrypt($request->password_1)]);
        DB::table('member_rpass')->where('email',$request->email)->delete();
        Session::flash('alert',"Password changed, you can login now");
        Session::flash('alert-type','success');
        return redirect('home');
     }


     public function doCompanyPwdReset(Request $request){
       Company::where('email',$request->email)->update(['password' => bcrypt($request->password_1)]);
       DB::table('company_rpass')->where('email',$request->email)->delete();
       Session::flash('alert',"Password changed, you can login now");
       Session::flash('alert-type','success');
       return redirect('home');
     }



    public function __construct()
    {
        $this->middleware('guest');
    }
}
