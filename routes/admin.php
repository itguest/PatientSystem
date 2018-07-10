<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

// Route::group([
//     'prefix'     => config('backpack.base.route_prefix', 'admin'),
//     'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
//     'namespace'  => 'App\Http\Controllers\Admin',
// ], function () { // custom admin routes
//     // CRUD resources and other admin routes
//     CRUD::resource('monster', 'MonsterCrudController');
//     CRUD::resource('icon', 'IconCrudController');
//     CRUD::resource('product', 'ProductCrudController');
// }); // this should be the absolute last line of this file

 CRUD::resource('tag', 'TagCrudController');
 CRUD::resource('app', 'TheAppointmentCrudController');
 CRUD::resource('thePatient', 'The_patientCrudController');
 CRUD::resource('clinic', 'ClinicCrudController');