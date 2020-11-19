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


Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::middleware(['auth','admin'])->group(function(){
    Route::resource('users','UsersController');
    Route::post('users/{user}/togglestatus','UsersController@togglestatus')->name('users.togglestatus');
    Route::post('users/{user}/togglerole','UsersController@togglerole')->name('users.togglerole');
});
Route::middleware(['auth','staff'])->group(function(){
    Route::resource('companies','CompaniesController');
    Route::resource('directors','DirectorsController');
    Route::get('/alldirectors','DirectorsController@alldirectors')->name('alldirectors');
    Route::get('/allshareholders','DirectorsController@allshareholders')->name('allshareholders');
    Route::get('/companydirectors/{company}','DirectorsController@companydirectors')->name('companydirectors');
    Route::get('/companyshareholders/{company}','DirectorsController@companyshareholders')->name('companyshareholders');
    Route::get('/createdirector/{company}','DirectorsController@createdirector')->name('createdirector');
    Route::get('/createshareholder/{company}','DirectorsController@createshareholder')->name('createshareholder');
});
