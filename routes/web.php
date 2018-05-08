<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

Route::get('/', function(){
    return redirect('/home');
});

Route::get('home', function () {
  return view('home');
});

//members
Route::get('members/confirmation','MemberController@confirmRegistration')->name('member.confirmation');
Route::post('members/register', 'MemberController@requestMailVerification')->name('post.member.register');
Route::get('members/register', 'MemberController@register')->name('member.register');
Route::post('members/login', 'Auth\LoginController@doLoginMember')->name('post.member.login');
Route::get('members/login', 'Auth\LoginController@showMemberLoginForm')->name('member.login');
Route::get('members/password/reset','Auth\ForgotPasswordController@memberPwdForm')->name('member.password.request');
Route::post('members/password/reset','Auth\ForgotPasswordController@doMemberPwdRequest')->name('post.member.password.request');
Route::get('members/password/reset_confirm','Auth\ForgotPasswordController@memberNewPwdForm')->name('member.password.reset');
Route::post('members/password/reset_confirm','Auth\ForgotPasswordController@doMemberPwdReset')->name('post.member.password.reset');

//company
Route::get('company/register','CompanyController@register')->name('company.register');
Route::post('company/register','CompanyController@requestMailVerification')->name('post.company.register');
Route::get('company/confirmation','CompanyController@confirmRegistration')->name('company.confirmation');
Route::post('company/login', 'Auth\LoginController@doLoginCompany')->name('post.company.login');
Route::get('company/login', 'Auth\LoginController@showCompanyLoginForm')->name('company.login');
Route::get('company/password/reset','Auth\ForgotPasswordController@companyPwdForm')->name('company.password.request');
Route::post('company/password/reset','Auth\ForgotPasswordController@doCompanyPwdRequest')->name('post.company.password.request');
Route::get('company/password/reset_confirm','Auth\ForgotPasswordController@companyNewPwdReset')->name('company.password.reset');
Route::post('company/password/reset_confirm','Auth\ForgotPasswordController@doCompanyPwdReset')->name('post.company.password.reset');
Route::get('company/postingJob','CompanyController@showPostingJobForm')->name('company.postingJob');
Route::post('company/postingJob','CompanyController@PostingJobValidation')->name('post.company.postingJob.validation');

//home
Route::get('home', 'HomeController@index')->name('home');

// Authentication Routes...
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//user
Route::get('user','UserController@index');
