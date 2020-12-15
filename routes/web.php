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




Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'ActionController@index')->name("front-end.index");

    Route::group(['namespace' => 'Customer','prefix'=>'customer'], function () {
        Route::get('/register', 'CustomerController@register')->name("customer.register");
        Route::post('/register', 'CustomerController@registerAction')->name("customer.registerAction");
        Route::get('/login', 'CustomerController@login')->name("customer.login");
        Route::get('/logout', 'CustomerController@logout')->name("customer.logout");
        Route::post('/login', 'CustomerController@loginAction')->name("customer.loginAction");

    });


    Route::group(['namespace' => 'TypeService'], function () {
        Route::get('/typeservice/{id}', 'TypeServiceController@load')->name("front-end.typeService.load");
    });
    Route::group(['namespace' => 'Service'], function () {
        Route::get('/service/{id}', 'ServiceController@load')->name("front-end.service.load");
    });
});

Route::group(['middleware' => 'auth','prefix'=>'admin','namespace' => 'Adminhtml'], function () {

    Route::get('/', function () {
        return view('/adminhtml/dashboard/index');
    });

    Route::group(['namespace' => 'Employee','prefix'=>'employee'], function()
    {
        Route::get('/', 'EmployeeController@index')->name("employee");
        Route::get('/create', 'EmployeeController@create')->name('employee.create');
        Route::post('/save', 'EmployeeController@save')->name('employee.save');
        Route::get('/delete/{id}', 'EmployeeController@delete')->name('employee.delete');
        Route::get('/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
        Route::post('/update', 'EmployeeController@update')->name('employee.update');
        Route::get('/schedule', 'EmployeeController@schedule')->name('employee.schedule');

    });


    Route::group(['namespace' => 'Customer','prefix'=>'customer'], function()
    {
        Route::get('/', 'CustomerController@index')->name("customer");
        Route::get('/create', 'CustomerController@create')->name('customer.create');
        Route::post('/save', 'CustomerController@save')->name('customer.save');
        Route::get('/delete/{id}', 'CustomerController@delete')->name('customer.delete');
        Route::get('/edit/{id}', 'CustomerController@edit')->name('customer.edit');
        Route::post('/update', 'CustomerController@update')->name('customer.update');

    });

    Route::group(['namespace' => 'TypeService','prefix'=>'typeService'], function()
    {
        Route::get('/', 'TypeServiceController@index')->name("typeService");
        Route::get('/create', 'TypeServiceController@create')->name('typeService.create');
        Route::post('/save', 'TypeServiceController@save')->name('typeService.save');
        Route::get('/delete/{id}', 'TypeServiceController@delete')->name('typeService.delete');
        Route::get('/edit/{id}', 'TypeServiceController@edit')->name('typeService.edit');
        Route::post('/update', 'TypeServiceController@update')->name('typeService.update');

    });


    Route::group(['namespace' => 'Service','prefix'=>'service'], function()
    {
        Route::get('/', 'ServiceController@index')->name("service");
        Route::get('/create', 'ServiceController@create')->name('service.create');
        Route::post('/save', 'ServiceController@save')->name('service.save');
        Route::get('/delete/{id}', 'ServiceController@delete')->name('service.delete');
        Route::get('/edit/{id}', 'ServiceController@edit')->name('service.edit');
        Route::post('/update', 'ServiceController@update')->name('service.update');

    });


    Route::group(['namespace' => 'Process','prefix'=>'process'], function()
    {
        Route::get('/', 'ProcessController@index')->name("process");
        Route::get('/create', 'ProcessController@create')->name('process.create');
        Route::post('/save', 'ProcessController@save')->name('process.save');
        Route::get('/delete/{id}', 'ProcessController@delete')->name('process.delete');
        Route::get('/edit/{id}', 'ProcessController@edit')->name('process.edit');
        Route::post('/update', 'ProcessController@update')->name('process.update');

    });

    Route::get('/login', function () {
        return view('/login');
    });
    Route::get('/logout', 'CustomAction@logoutAdmin')->name('logout.admin');
});
