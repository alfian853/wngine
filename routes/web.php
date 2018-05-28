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

// Route::group(['middleware' => 'auth'], function() {

    // Member
	Route::get('member/confirmation','MemberController@confirmRegistration')->name('member.confirmation');
    Route::post('member/register', 'MemberController@requestMailVerification')->name('post.member.register');
	Route::get('member/register', 'MemberController@register')->name('member.register');

	Route::get('member/password/reset','Auth\ForgotPasswordController@memberPwdForm')->name('member.password.request');
	Route::post('member/password/reset','Auth\ForgotPasswordController@doMemberPwdRequest')->name('post.member.password.request');
	Route::get('member/password/reset_confirm','Auth\ForgotPasswordController@memberNewPwdForm')->name('member.password.reset');
	Route::post('member/password/reset_confirm','Auth\ForgotPasswordController@doMemberPwdReset')->name('post.member.password.reset');
    Route::get('member/profile','MemberController@showProfile')->name('member.profile');
	Route::get('member/profile/{nick}','MemberController@showProfileById')->name('member.profilebyid');
    Route::post('member/change_profile/{nick}','MemberController@updateProfilPict')->name('post.member.changePict');
    Route::post('member/change_name','MemberController@updateName')->name('post.member.changeName');

	// Company
	Route::get('company/register','CompanyController@register')->name('company.register');
	Route::post('company/register','CompanyController@requestMailVerification')->name('post.company.register');
	Route::get('company/confirmation','CompanyController@confirmRegistration')->name('company.confirmation');


	Route::get('company/password/reset','Auth\ForgotPasswordController@companyPwdForm')->name('company.password.request');
	Route::post('company/password/reset','Auth\ForgotPasswordController@doCompanyPwdRequest')->name('post.company.password.request');
	Route::get('company/password/reset_confirm','Auth\ForgotPasswordController@companyNewPwdForm')->name('company.password.reset');
	Route::post('company/password/reset_confirm','Auth\ForgotPasswordController@doCompanyPwdReset')->name('post.company.password.reset');
	Route::get('company/profile','CompanyController@showProfile')->name('company.profile');

	// Home
	Route::get('home', 'HomeController@index')->name('home');

	// Authentication Routes...
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@doLogin');

	// Job
    Route::get('company/job/list','JobController@companyProjectList')->name('company.job.list');
    Route::get('member/job/list','JobController@memberProjectList')->name('member.job.list');
	Route::get('company/job/detail/{id}','JobController@projectAdmin')->name('company.job.detail');
    Route::post('member/job/submit/{id}','JobController@submitJob')->name('member.job.submit');
    Route::post('job/edit_comment','JobController@updateComment');
	Route::get('job/search','JobController@showJobSearch');
	Route::get('job/detail/{id}','JobController@showDescriptionJob')->name('job.detail');
	Route::get('job/search_query','JobController@searchQuery');
	Route::get('job/create','JobController@showPostingJobForm')->name('job.postingJob');
	Route::post('job/create','JobController@postingJob')->name('post.job.postingJob');
	Route::post('job/take','JobController@takeJob')->name('post.job.take');
    Route::get('job/get_submission_url','JobController@getSubmissionUrl');
    Route::post('job/edit_description/{id}','JobController@editDescription');

// });
//untuk test view apapun
Route::get('/dummy',function(){
    return view('dummy');
});

// Errors
Route::get('/404', function() {
    return view('errors.404');
})->name('404');

Route::get('/403', function() {
    return view('errors.403');
})->name('403');

