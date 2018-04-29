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
