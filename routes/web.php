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

Route::get('/', 'JobController@index');
Route::post('/', 'JobController@addJob');
Route::get('/companies', 'CompanyController@index');
Route::get('/login', function () {
    return view('login');
});
Route::get('/add', function () {
    return view('add');
});
Route::get('/filter', function () {
    return view('index');
});


