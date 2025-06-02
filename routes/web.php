<?php

use Illuminate\Support\Facades\Route;

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

//Auth
Route::get('/', 'AuthController@loginView')->name('login.view');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/logout', 'AuthController@logout')->name('logout');


//SuperAdmin
Route::group(['middleware' => 'superAdmin', 'prefix' => 'superAdmin', 'namespace' => 'SuperAdmin', 'as' => 'superAdmin.'], function () {

    //Main
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/dashboard', 'MainController@dashboard')->name('dashboard');
    });

    //Admin
    Route::group(['namespace' => 'Admin'], function () {
        Route::get('admin/list', 'AdminController@list')->name('admins.list');
        Route::get('/create/admin', 'AdminController@create')->name('create.admin');
        Route::post('/store/admin', 'AdminController@store')->name('store.admin');
        Route::get('/edit/{id}/admin', 'AdminController@edit')->name('edit.admin')->middleware('signed');
        Route::put('/update/{id}/admin', 'AdminController@update')->name('update.admin')->middleware('signed');
        Route::delete('/admin/{id}/delete', 'AdminController@delete')->name('delete.admin')->middleware('signed');
    });

    //Data Entry Operator
    Route::group(['namespace' => 'DataEntry'], function () {
        Route::get('data/entry/operators/list', 'DataEntryController@list')->name('data.entry.operators.list');
        Route::get('/create/data/entry/operator', 'DataEntryController@create')->name('create.data.entry.operator');
        Route::post('/store/data/entry/operator', 'DataEntryController@store')->name('store.data.entry.operator');
        Route::get('/edit/{id}/data/entry/operator', 'DataEntryController@edit')->name('edit.data.entry.operator')->middleware('signed');
        Route::put('/update/{id}/data/entry/operator', 'DataEntryController@update')->name('update.data.entry.operator')->middleware('signed');
        Route::delete('/data/entry/operator/{id}/delete', 'DataEntryController@delete')->name('delete.data.entry.operator')->middleware('signed');
    });

    //Application Form
    Route::group(['namespace' => 'ApplicationForm'], function () {
        Route::get('/all/application/forms', 'ApplicationFormController@all')->name('all.application.forms');
        Route::post('/change/application/form/{id}/status', 'ApplicationFormController@changeStatus')->name('change.application.form.status')->middleware('signed');
    });
});

//Admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    //Main
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/dashboard', 'MainController@dashboard')->name('dashboard');
    });

    //Application Form
    Route::group(['namespace' => 'ApplicationForm'], function () {
        Route::get('/application/forms', 'ApplicationFormController@applicationForms')->name('get.application.forms');
        Route::post('/change/application/form/{id}/status', 'ApplicationFormController@changeStatus')->name('change.application.form.status')->middleware('signed');
    });

});

//Data Entry Operator
Route::group(['middleware' => 'dataEntryOperator', 'prefix' => 'dataEntryOperator', 'namespace' => 'DataEntryOperator', 'as' => 'dataEntry.'], function () {

    //Main
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/dashboard', 'MainController@dashboard')->name('dashboard');
    });

    //Application Form
    Route::group(['namespace' => 'ApplicationForm'], function () {
        Route::get('/application/forms/list', 'ApplicationFormController@list')->name('application.forms.list');
        Route::get('/create/application/form', 'ApplicationFormController@create')->name('create.application.form');
        Route::post('/store/application/form', 'ApplicationFormController@store')->name('store.application.form');
        Route::post('/edit/application/form', 'ApplicationFormController@edit')->name('edit.application.form');
        Route::put('/update/{id}/application/form', 'ApplicationFormController@update')->name('update.application.form')->middleware('signed');
        Route::delete('/application/form/{id}/delete', 'ApplicationFormController@delete')->name('delete.application.form')->middleware('signed');
    });
});

//Super Admin, Admin Or Data Entry Operator
Route::group(['middleware' => 'adminOrDataOperator'], function () {
    Route::post('/application/form/view', 'DataEntryOperator\ApplicationForm\ApplicationFormController@view')->name('view.application.form');
});
