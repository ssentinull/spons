<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ping', 'Auth\RegisterController@ping');

Route::post('auth/register/student/individual', 'Auth\Registercontroller@registerStudentIndividual');
Route::post('auth/register/student/organization', 'Auth\RegisterController@registerStudentOrganization');
Route::post('auth/register/company', 'Auth\RegisterController@registerCompany');
