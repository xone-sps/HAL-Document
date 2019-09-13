<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AdminController@dashboard')->name('admin.dashboard');
Route::get('/user','AdminController@user')->name('admin.user');
Route::post('/user/save','AdminController@SaveUser')->name('user.save');
Route::get('/user/delete/{id?}','AdminController@DeleteUser')->name('user.delete');

Route::get('/document','AdminController@document')->name('admin.document');
Route::post('/document/save','AdminController@SaveDocument')->name('document.save');
Route::post('/document/update/{id?}','AdminController@UpdateDocument')->name('document.update');
Route::get('/document/delete/{id?}','AdminController@DeleteDocument')->name('document.delete');

Route::get('/document-type','AdminController@doctype')->name('doctype');
Route::post('/document-type/save','AdminController@SaveDoctype')->name('doctype.save');
Route::post('/document-type/update/{id?}','AdminController@UpdateDocType')->name('doctype.update');
Route::get('/document-type/delete/{id?}','AdminController@DeleteDoctype')->name('doctype.delete');

// Department route
Route::get('/department','AdminController@getDepartment')->name('department');
Route::post('/department/save','AdminController@SaveDepartment')->name('department.save');
Route::post('/department/update/{id?}','AdminController@UpdateDepartment')->name('department.update');
Route::get('/department/delete/{id?}','AdminController@DeleteDepartment')->name('department.delete');

Route::get('/login','LoginController@login')->name('login');