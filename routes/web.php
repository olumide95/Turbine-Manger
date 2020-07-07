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


Route::auth();

Route::get('/turbines', 'TurbineController@index')->name('turbines');

Route::any('/turbines/{t_name}/{s_name}/generate-report', 'SystemController@generate_report')->name('generate-report');
Route::any('/turbines/{name}/view-systems', 'SystemController@index')->name('view-systems');
Route::any('/turbines/{t_name}/{s_name}/view-devices', 'DeviceController@index')->name('view-devices');

Route::post('/turbine/log/update', 'TurbineController@add_log');
Route::any('/turbine/generate/report', 'TurbineController@generate_report')->name('generate-turbine-report');

Route::get('/turbine/fails/update', 'TurbineController@update_fails');
Route::post('/turbine/logs', 'TurbineController@get_log');
Route::any('/turbine/update/logs/{id}', 'TurbineController@update_log');
Route::post('/turbine/add', 'TurbineController@create');
Route::get('/turbine/delete', 'TurbineController@delete');

Route::get('/', 'HomeController@index')->name('home');

Route::post('/system/log/update', 'SystemController@update_log')->name('update-operation-log');
Route::post('/system/logs', 'SystemController@get_log')->name('get-operation-log');
Route::any('/system/generate/report', 'SystemController@generate_report_csv')->name('generate-system-report');
Route::post('/device/log/update', 'DeviceController@update_log')->name('update-log');
Route::post('/device/logs', 'DeviceController@get_log')->name('get-log');

Route::any('/device/add', 'DeviceController@create')->name('add-device');
