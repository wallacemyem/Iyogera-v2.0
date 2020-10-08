<?php

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;

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
Route::get('users', 'Api\UserController@index');


Route::post('login', 'Api\AuthController@login');
Route::get('refresh', 'Api\AuthController@refresh');
Route::get('me', 'Api\AuthController@me');

//Lessons
		Route::get('lessons', 'LessonController@index');
		Route::get('lesson/{id}', 'LessonController@show');
		Route::post('lessons', 'LessonController@store');
		Route::put('lessons', 'LessonController@store');
		Route::delete('lesson/{id}', 'LessonController@destroy');


		//LiveLesson
		Route::get('live_lessons', 'Livelessons@lists');
		Route::get('live_lesson', 'Livelessons@index');
		Route::post('live_lesson', 'Livelessons@store');
		Route::get('live_lesson/{id}', 'Livelessons@show');
		Route::put('live_lesson', 'Livelessons@store');
		Route::delete('live_lesson/{id}', 'Livelessons@destroy');

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();

    	
});



