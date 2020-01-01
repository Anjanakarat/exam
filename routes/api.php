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

Route::post('createuser/','examController@create_user');

Route::get('userlogin/','examController@user_login');

Route::post('createAdmin/','examController@create_admin');

Route::get('adminLogin/','examController@admin_login');

Route::post('classReg/','classController@classRegister');

Route::post('subjectReg/','subjectController@subjectRegister');

Route::get('classentry/','mcqController@classEntry');

Route::get('subjectentry/','mcqController@subjectEntry');

Route::post('questionentry/','mcqController@questionEntry');

