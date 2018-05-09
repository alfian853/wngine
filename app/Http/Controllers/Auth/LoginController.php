<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     public function showMemberLoginForm(){
       return view('members.login');
     }

     public function showCompanyLoginForm(){
       return view('company.login');
     }


    public function logout(){
      // Auth::logout() tidak bisa
      Auth::guard('company')->logout();
      Auth::guard('member')->logout();
      return redirect('home');
    }

    public function doLoginMember(Request $request){

      $credentials = $request->only('email','password');

      if ($login = Auth::guard('member')->attempt($credentials)) {
        Session::flash('alert','welcome ');
        Session::flash('alert-type','success');
        return redirect(route('home'));
      }
      else{
        Session::flash('alert','Wrong Username/Password');
        Session::flash('alert-type','failed');
        return redirect(route('member.login'));
      }
    }

    public function doLoginCompany(Request $request){

      $credentials = $request->only('email','password');

      if ($login = Auth::guard('company')->attempt($credentials)) {
        Session::flash('alert','welcome '.$request['email']);
        Session::flash('alert-type','success');
          return redirect(route('home'));
        }
        else{
          Session::flash('alert','Wrong Username/Password');
          Session::flash('alert-type','failed');
          return redirect(route('company.login'));
        }

    }

    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
