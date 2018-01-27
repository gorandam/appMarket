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

Auth::routes();

//Route to our backand interface
Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group(function (){
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', [
        'uses' => 'ManageController@dashboard',
        'as' => 'manage.dashboard',
     ]);
    Route::resource('/users', 'UserController');// Here we create our resource Routes form UserController
    Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);// Here we create resoure Routes for PermissionsController without destroy route and method
});

Route::get('/home', 'HomeController@index')->name('home');
