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
    return view('welcome');
});
// Route::get('/', function () {
//     return view('layout');
// });

// //appoinments 
 
Route::get('/admin/app', 'Admin\TheAppointmentCrudController@index');
Route::get('/admin/theappointment/create', 'Admin\TheAppointmentCrudController@store');





Route::get('/admin/thePatient', 'Admin\The_patientCrudController@index');
// Route::get('/app/create', 'Admin\AppointmentCrudController@setup')->name('home');
// Route::get('/app/{app}', 'Admin\AppointmentCrudController@index');
// // Route::get('/admin/appointment', 'Admin\AppointmentCrudController@setup');
// Route::post('/app/store', 'Admin\AppointmentCrudController@store');
// Route::post('/app/update', 'Admin\AppointmentCrudController@update');
// // Search Routes

