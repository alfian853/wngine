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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Shows login form.
     *
     * @return void
     */
    public function showLoginForm(){
        return view('login');
    }

    /**
     * Execute login.
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Request
     */
    public function doLogin(Request $request){
        $guards = ['member' => 'm_name', 'company' => 'c_name'];
        $credentials = $request->only('email','password');

        foreach($guards as $guard => $name)
        {
            if(Auth::guard($guard)->attempt($credentials))
            {
                $user = Auth::guard($guard)->user();

                $request->session()->flash('alert', 
                    'Welcome back to Wngine, '.$user->$name.'!');
                $request->session()->flash('alert-type', 'success');
                return redirect(route('home'));
            }
        }

        $request->session()->flash('alert', 'Invalid Email/Password');
        $request->session()->flash('alert-type', 'failed');

        return redirect(route('login'));
    }

    /**
     * Execute logout.
     *
     * @return Illuminate\Http\Request
     */
    public function logout(){
      Auth::guard('company')->logout();
      Auth::guard('member')->logout();
      return redirect('home');
    }
}
