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

Route::post('members/login', 'Auth\LoginController@doLoginMember')->name('post.member.login');
Route::post('members/login', 'Auth\LoginController@doLoginMember')->name('post.member.login');
Route::get('members/login', 'Auth\LoginController@showMemberLoginForm')->name('member.login');
Route::post('company/login', 'Auth\LoginController@doLoginCompany')->name('post.company.login');
Route::get('company/login', 'Auth\LoginController@showCompanyLoginForm')->name('company.login');

// Route::group(['middleware' => 'auth'], function() {

// member
	Route::get('members/confirmation','MemberController@confirmRegistration')->name('member.confirmation');
	Route::post('members/register', 'MemberController@requestMailVerification')->name('post.member.register');
	Route::get('members/register', 'MemberController@register')->name('member.register');

	Route::get('members/password/reset','Auth\ForgotPasswordController@memberPwdForm')->name('member.password.request');
	Route::post('members/password/reset','Auth\ForgotPasswordController@doMemberPwdRequest')->name('post.member.password.request');
	Route::get('members/password/reset_confirm','Auth\ForgotPasswordController@memberNewPwdForm')->name('member.password.reset');
	Route::post('members/password/reset_confirm','Auth\ForgotPasswordController@doMemberPwdReset')->name('post.member.password.reset');
  Route::get('members/view_profile','MemberController@showProfile')->name('member.profile');
	Route::get('members/view_profile/{id}','MemberController@showProfileById')->name('member.profilebyid');

	// company
	Route::get('company/register','CompanyController@register')->name('company.register');
	Route::post('company/register','CompanyController@requestMailVerification')->name('post.company.register');
	Route::get('company/confirmation','CompanyController@confirmRegistration')->name('company.confirmation');


	Route::get('company/password/reset','Auth\ForgotPasswordController@companyPwdForm')->name('company.password.request');
	Route::post('company/password/reset','Auth\ForgotPasswordController@doCompanyPwdRequest')->name('post.company.password.request');
	Route::get('company/password/reset_confirm','Auth\ForgotPasswordController@companyNewPwdForm')->name('company.password.reset');
	Route::post('company/password/reset_confirm','Auth\ForgotPasswordController@doCompanyPwdReset')->name('post.company.password.reset');
	Route::get('company/view_profile','CompanyController@showProfile')->name('company.profile');

	// home
	Route::get('home', 'HomeController@index')->name('home');

	// Authentication Routes...
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	//job
  Route::get('company/job/list','JobController@projectList')->name('company.job.list');
	Route::get('company/job/detail/{id}','JobController@projectListTake')->name('company.job.detail');
  Route::post('member/job/submit/{id}','JobController@submitJob')->name('member.job.submit');
  Route::post('job/edit_comment','JobController@updateComment');
	Route::get('job/search','JobController@showJobSearch');
	Route::get('job/detail/{id}','JobController@showDescriptionJob')->name('job.detail');
	Route::get('job/search_query','JobController@searchQuery');
	Route::get('job/create','JobController@showPostingJobForm')->name('job.postingJob');
	Route::post('job/create','JobController@postingJob')->name('post.job.postingJob');
	Route::post('job/take_job','JobController@takeJob');
  Route::get('job/get_submission_url','JobController@getSubmissionUrl');

// });
//untuk test view apapun
Route::get('/dummy',function(){
    return view('dummy');
});
