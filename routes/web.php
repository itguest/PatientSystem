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

Route::get('/', function () {
    return view('layout');
});

//appoinments 
 
Route::get('/app/create', 'Admin\AppointmentCrudController@setup')->name('home');
// Route::get('/admin/appointment', 'Admin\AppointmentCrudController@setup');
Route::post('/app/store', 'Admin\AppointmentCrudController@store');
Route::post('/app/update', 'Admin\AppointmentCrudController@update');