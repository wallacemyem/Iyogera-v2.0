<?php
/*
|--------------------------------------------------------------------------
| Accounting Routes
|--------------------------------------------------------------------------
|
| This route is responsible for handling the Accounting staffs
|
|
|
*/
Route::get('invoice', 'InvoiceController@index')->name('invoice.index');
Route::get('invoice_list', 'InvoiceController@list')->name('invoice.list');

Route::get('single_invoice_create', 'InvoiceController@single_invoice_create')->name('invoice.single.create');
Route::post('single_invoice_store', 'InvoiceController@single_invoice_store')->name('invoice.single.store');

Route::get('single_invoice_edit/{invoice_id}', 'InvoiceController@single_invoice_edit')->name('invoice.single.edit');
Route::patch('single_invoice_update/{invoice_id}', 'InvoiceController@single_invoice_update')->name('invoice.single.update');

Route::get('mass_invoice_create', 'InvoiceController@mass_invoice_create')->name('invoice.mass.create');
Route::post('mass_invoice_store', 'InvoiceController@mass_invoice_store')->name('invoice.mass.store');

Route::get('mass_invoice_edit/{invoice_id}', 'InvoiceController@mass_invoice_edit')->name('invoice.mass.edit');
Route::patch('mass_invoice_update/{invoice_id}', 'InvoiceController@mass_invoice_update')->name('invoice.mass.update');

Route::delete('destroy/{invoice_id}', 'InvoiceController@destroy')->name('invoice.destroy');

Route::resource('expense_category', 'ExpenseCategoryController');
Route::get('expense_category_list', 'ExpenseCategoryController@list')->name('expense_category.list');

Route::resource('expense', 'ExpenseController');
Route::get('expenselist', 'ExpenseController@list')->name('expense.list');

