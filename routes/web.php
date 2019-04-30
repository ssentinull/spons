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

Route::get('/welcome', function () {
    return view('welcome');
});

// General Routes
Route::get('/', 'PagesController@landingPage')->name('landingPage');
Route::get('events', 'PagesController@eventsPage')->name('eventsPage');
Route::get('error', 'PagesController@errorPage')->name('errorPage');

// Student role only Routes
Route::group(['middleware' => ['verifyStudent']], function(){
    Route::get('createEvent', 'PagesController@createEventPage')->name('createEventPage');
    Route::post('createEvent', 'EventsController@create')->name('createEvent');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register/company', 'Auth\RegisterController@showCompanyRegistrationForm')->name('registerCompany');
Route::get('register', 'Auth\RegisterController@showStudentRegistrationForm');
Route::post('registerStudent', 'Auth\RegisterController@register')->name('registerStudent');
Route::post('registerStudent2', 'Auth\RegisterController@register2')->name('registerStudent2');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail', function () {
    return view('detail');
    
});

// Deprecated routes
// Route::get('/signIn', 'PagesController@signInPage');
// Route::get('/register/company', 'PagesController@companyRegisterPage');
// Route::get('/register/student', 'PagesController@studentRegisterPage');
