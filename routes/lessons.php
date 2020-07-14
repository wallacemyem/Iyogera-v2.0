<?php
/*
|--------------------------------------------------------------------------
| Lessons Routes
|--------------------------------------------------------------------------
|
| This route is responsible for handling the Lessons process
|
|
|
*/
Route::resource('lesson', 'LessonController');
Route::get('live_lessons', 'Livelessons@index')->name('live_lessons.index');