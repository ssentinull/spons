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
Route::get('eventDetail/{eventId}', 'PagesController@eventDetailPage')->name('eventDetailPage');
Route::get('companies', 'PagesController@companiesPage')->name('companiesPage');
Route::get('companyDetail/{companyId}', 'PagesController@companyDetailPage')->name('companyDetailPage');
Route::get('profile', ['middleware' => 'auth', 'uses' => 'PagesController@profilePage'])->name('profilePage');
Route::get('error', 'PagesController@errorPage')->name('errorPage');

// Student role only Routes
Route::group(['middleware' => ['verifyStudent']], function(){
    Route::get('createEvent', 'PagesController@createEventPage')->name('createEventPage');
    Route::post('createEvent', 'EventsController@create')->name('createEvent');
});

Route::group(['middleware' => ['verifyCompany']], function(){
    Route::get('createGrant', 'PagesController@createGrantPage')->name('createGrantPage');
    Route::post('createGrant', 'GrantsController@create')->name('createGrant');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('loginPage');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register/company', 'Auth\RegisterController@showCompanyRegistrationForm')->name('registerCompanyPage');
Route::get('register', 'Auth\RegisterController@showStudentRegistrationForm')->name('registerStudentPage');
Route::post('registerStudent', 'Auth\RegisterController@registerStudentIndividual')->name('registerStudentIndividual');
Route::post('registerStudentOrganization', 'Auth\RegisterController@registerStudentOrganization')->name('registerStudentOrganization');
Route::post('registerCompany', 'Auth\RegisterController@registerCompany')->name('registerCompany');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Deprecated routes
// Route::get('/signIn', 'PagesController@signInPage');
// Route::get('/register/company', 'PagesController@companyRegisterPage');
// Route::get('/register/student', 'PagesController@studentRegisterPage');

Route::get('/request', function () {
    return view('pages.profileRequest');
});
