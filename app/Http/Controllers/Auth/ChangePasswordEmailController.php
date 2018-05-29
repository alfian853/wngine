<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ChangePasswordEmailController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Change Password Email Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles user's request to change their password
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
        $this->middleware('auth:member,company');
    }

    /**
     * Shows login form.
     *
     * @return void
     */
    public function showForm(){
        return view('password_change');
    }

    /**
     * Execute change password
     *
     * @param Illuminate\Http\Request $request
     * @return view
     */
    public function doChange(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $old_password = $request->old_password;
        $new_password = $request->new_password;

        if(!Hash::check($old_password, $request->user()->password))
            return Redirect::back()->withErrors([
                'old_password' => 'Old password doesn\'t match',
            ]);

        $request->user()->fill([
            'password' => Hash::make($new_password),
        ])->save();

        $request->session()->flash('alert', 'Password successfully reset');
        $request->session()->flash('alert-type', 'success');

        return redirect(route('home'));
    }
}
