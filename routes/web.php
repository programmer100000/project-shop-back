<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
})->middleware('checklogin')->name('home');
Route::get('/admin/login' , function(){
    return view('login');
})->name('login');
Route::post('/admin/login/form' , 'logincontroller@login')->name('login.form');
Route::get('/logout' , function(){
    
    Auth::logout();
    
});
Route::get('/admin/slider' , 'AdminPanelController@slider')->name('slider');
Route::get('/admin/add/slider/image' , 'AdminPanelController@addslider')->name('add.slider');
Route::post('/admin/add/slider/image' , 'AdminPanelController@addslider')->name('add.slider');
Route::post('/admin/delet/slider/image' , 'AdminPanelController@deletslider')->name('delete.slider');
Route::get('/admin/edit/slider/image/{id}' , 'AdminPanelController@editslider')->name('edit.slider');
Route::post('/admin/edit/slider/image' , 'AdminPanelController@editsliderform')->name('edit.slider');
