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

Route::get('home', function () {
  return view('home',array('name' =>'alfian'));
});

//members
Route::get('members/confirmation','MemberController@confirmRegistration');
Route::get('members', 'MemberController@index');
Route::post('members', 'MemberController@createUser');
Route::get('members/register', 'MemberController@register');

//company
Route::get('company','CompanyController@index');
Route::get('company/register','CompanyController@register');
Route::post('company','CompanyController@createCompany');
Route::get('company/confirmation','CompanyController@confirmRegistration');

//home
Route::get('/home', 'HomeController@index')->name('home');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//user
Route::get('user','UserController@index');
