<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){
    return view('auth/login');
});

Route::get('files/edit/{id}' , 'UploadController@showedit');
Route::get('files/delete/{id}' , 'UploadController@destroy');
Route::get('mine' , 'UploadController@mine');
Route::get('admin', 'AdminController@store');
Route::get('admin/edit/{id}' , 'AdminController@showfileadmin');
Route::get('admin/delete/{id}' , 'AdminController@destroy');
Route::get('admin/file' , 'AdminController@file');
Route::get('admin/users', 'AdminController@user');
Route::get('admin/deleteuser/{id}' , 'AdminController@destroyuser');
Route::get('mine/source/{id}', 'UploadController@show');
Route::get('admin/block/{id}',  'AdminController@adminblock');
Route::get('admin/unblock/{id}',  'AdminController@adminunblock');
Route::get('contact',  'UploadController@contactview');
Route::post('home', ['as' => 'poster', 'uses' => 'UploadController@create']);
Route::post('files/edit/{id}', ['as' => 'edit', 'uses' => 'UploadController@edit']);
Route::post('admin/edit/{id}', ['as' => 'edit', 'uses' => 'AdminController@fileadmin']);
Route::post('contact', ['as' => 'contact', 'uses' => 'UploadController@contact']);