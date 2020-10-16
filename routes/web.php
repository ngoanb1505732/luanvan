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


Route::get ('dashboard', 'DashboardController@index');
Route::group(['middleware' => 'auth','prefix'=>'admin','namespace' => 'Adminhtml'], function () {
    Route::get('/', function () {
        return view('/adminhtml/dashboard/index');
    });
    Route::group(['namespace' => 'Employee','prefix'=>'employee'], function()
    {
        Route::get('/', 'EmployeeController@index')->name("employee");
        Route::get('/create', 'EmployeeController@create')->name('employee.create');
        Route::get('/save', 'EmployeeController@save')->name('employee.save');
    });
    Route::get('/login', function () {
        return view('/login');
    });
});
