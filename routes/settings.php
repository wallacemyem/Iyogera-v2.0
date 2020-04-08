<?php

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('system_settings', 'SettingsController@system')->name('system.settings');
    Route::patch('system_update', 'SettingsController@system_update')->name('system.update');
    Route::post('logo_update', 'SettingsController@logo_update')->name('logo.update');
    Route::get('sms_settings', 'SettingsController@sms')->name('sms.settings');
    Route::get('payment_settings', 'SettingsController@payment')->name('payment.settings');
    Route::patch('payment_update/{type}', 'SettingsController@payment_update')->name('payment.update');
    Route::resource('language', 'LanguageController');
    Route::get('language_list', 'LanguageController@list')->name('language.list');
    Route::get('phrase/{language_id}', 'LanguageController@phrase')->name('language.phrase');
    Route::post('key_value_store', 'LanguageController@key_value_store')->name('phrase.update');
    Route::post('language_switch', 'LanguageController@changeLanguage')->name('language.switch');
    
    Route::get('smtp_settings', 'SettingsController@smtp')->name('smtp.settings');
    Route::patch('smtp_update', 'SettingsController@smtpUpdate')->name('smtp.update');


    Route::get('school_settings', 'SettingsController@school_settings')->name('school.settings');
    Route::patch('school_update/{id}', 'SettingsController@school_settings_update')->name('school.update');

