<?php
/*
|--------------------------------------------------------------------------
| Exams Routes
|--------------------------------------------------------------------------
|
| This route is responsible for handling the Exams process
|
|
|
*/
Route::resource('report' , 'ReportController');
Route::post('report_print' , 'ReportController@print4all')->name('report.print');
Route::get('report_print' , 'ReportController@print')->name('report.print');
Route::get('generate' , 'ReportController@generateIndex')->name('generate');
Route::post('report_printa' , 'ReportController@printa4')->name('report.printa');
Route::post('report_list', 'ReportController@list')->name('report.list');
Route::post('report_generate', 'ReportController@generate')->name('report.generate');