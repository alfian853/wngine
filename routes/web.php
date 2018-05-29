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

Route::get('/', function(){
    return redirect('/home');
});

Route::group(['middleware' => 'authUser:member'], function() {
  Route::post('member/change_profile/{nick}','MemberController@updateProfilPict')->name('post.member.changePict');
  Route::post('member/change_name','MemberController@updateName')->name('post.member.changeName');
  Route::post('member/change_quote','MemberController@updateQuote');
  Route::get('member/profile','MemberController@showProfile')->name('member.profile');
  Route::get('member/job/list','JobController@memberProjectList')->name('member.job.list');
  Route::post('member/job/submit/{id}','JobController@submitJob')->name('member.job.submit');
  Route::post('member/job/add_company_testimony/{id}','CompanyController@updateTestimony');
});
Route::group(['middleware' => 'authUser:company'], function() {
  Route::get('company/profile', 'CompanyController@showProfile')->name('company.profile');
  Route::get('company/job/list','JobController@companyProjectList')->name('company.job.list');
  Route::get('company/job/detail/{id}','JobController@projectAdmin')->name('company.job.detail');
  Route::post('company/job/pay/{id}','JobController@payWorker')->name('company.job.pay');
  Route::post('company/change_profile/{id}','CompanyController@updateProfilPict')->name('post.company.changePict');
  Route::post('job/edit_description/{id}','JobController@editDescription');
  Route::post('company/job/add_member_testimony/{id}','MemberController@updateTestimony');
});

    // Member
  Route::get('member/confirmation','MemberController@confirmRegistration')->name('member.confirmation');
  Route::post('member/register', 'MemberController@requestMailVerification')->name('post.member.register');
	Route::get('member/register', 'MemberController@register')->name('member.register');
	Route::get('member/password/reset_confirm','Auth\ForgotPasswordController@memberNewPwdForm')->name('member.password.reset');
	Route::post('member/password/reset_confirm','Auth\ForgotPasswordController@doMemberPwdReset')->name('post.member.password.reset');
	Route::get('member/profile/{id}','MemberController@showProfileById')->name('member.profilebyid');

	// Company
	Route::get('company/register','CompanyController@register')->name('company.register');
	Route::post('company/register','CompanyController@requestMailVerification')->name('post.company.register');
	Route::get('company/confirmation','CompanyController@confirmRegistration')->name('company.confirmation');
	Route::get('company/password/reset_confirm','Auth\ForgotPasswordController@companyNewPwdForm')->name('company.password.reset');
	Route::post('company/password/reset_confirm','Auth\ForgotPasswordController@doCompanyPwdReset')->name('post.company.password.reset');
  Route::get('company/profile/{id}', 'CompanyController@showProfileById');

	// Home
	Route::get('home', 'HomeController@index')->name('home');

	// Authentication Routes
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@doLogin');
  Route::get('password_reset', 'Auth\ForgotPasswordController@showForm')->name('password_reset');
  Route::post('password_reset', 'Auth\ForgotPasswordController@resetPass');
  Route::get('password_change', 'Auth\ChangePasswordEmailController@showForm')->name('password_change');
  Route::post('password_change', 'Auth\ChangePasswordEmailController@doChange');

	// Job
  Route::post('job/edit_comment','JobController@updateComment');
	Route::get('job/search','JobController@showJobSearch')->name('job.search');
	Route::get('job/detail/{id}','JobController@showDescriptionJob')->name('job.detail');
	Route::get('job/search_query','JobController@searchQuery');
	Route::get('job/create','JobController@showPostingJobForm')->name('job.postingJob');
	Route::post('job/create','JobController@postingJob')->name('post.job.postingJob');
	Route::post('job/take','JobController@takeJob')->name('post.job.take');
  Route::get('job/get_submission_url','JobController@getSubmissionUrl');
// });
//untuk test view apapun

// Errors
Route::get('/404', function() {
    return view('errors.404');
})->name('404');

Route::get('/403', function() {
    return view('errors.403');
})->name('403');
