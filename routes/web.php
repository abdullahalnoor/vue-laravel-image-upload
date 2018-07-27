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

Route::post('/upload','ImageUploadController@uploadImage');
Route::post('/product','ProductController@store');
Route::get('/view-products','ProductController@index');
Route::get('/edit-product/{id}','ProductController@edit');
Route::post('/update-product','ProductController@update');
