<?php
/*
|--------------------------------------------------------------------------
| Addon Routes
|--------------------------------------------------------------------------
|
| This route is responsible for handling the Addon process
|
|
|
*/
Route::resource('addon_manager', 'AddonController');
Route::get('addon_manager_list', 'AddonController@list')->name('addon_manager.list');