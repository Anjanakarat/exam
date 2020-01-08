<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('getAllClass', 'classController@fn_get_all_class');
Route::get('getAllSubjects', 'subjectController@fn_get_all_subjects');

Route::post('createuser', 'examController@create_user');
Route::post('userlogin', 'examController@user_login');
Route::post('createClass', 'classController@fn_create_class');
Route::post('createSubject', 'subjectController@fn_create_subject');
Route::post('createQuestion', 'mcqController@fn_create_question');
Route::post('getQuestion', 'mcqController@fn_get_question');
