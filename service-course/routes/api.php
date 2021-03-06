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

//MENTOR API ENPOINT
Route::get('mentors','MentorController@index');
Route::get('mentors/{id}','MentorController@show');
Route::post('mentors','MentorController@create');
Route::put('mentors/{id}','MentorController@update');
Route::delete('mentors/{id}','MentorController@destroy');

//COURSE API ENPOINT
Route::get('courses','CourseController@index');
Route::post('courses','CourseController@create');
Route::put('courses/{id}','CourseController@update');
Route::delete('courses/{id}','CourseController@destroy');