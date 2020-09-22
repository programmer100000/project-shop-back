<?php

use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
Route::get('/' , function(){
    return Redirect::to('http://localhost:3000');
});
Route::get('/admin', function () {
    return view('index');
})->middleware('checklogin')->name('home');
Route::get('/admin/login' , function(){
    return view('login');
})->name('login');
Route::post('/admin/login/form' , 'logincontroller@login')->name('login.form');
Route::get('/logout' , function(){
    
    Auth::logout();
    
});
//Slider routes
Route::get('/admin/slider' , 'AdminPanelController@slider')->name('slider');
Route::get('/admin/add/slider/image' , 'AdminPanelController@addslider')->name('add.slider');
Route::post('/admin/add/slider/image' , 'AdminPanelController@addslider')->name('add.slider');
Route::post('/admin/delet/slider/image' , 'AdminPanelController@deletslider')->name('delete.slider');
Route::get('/admin/edit/slider/image/{id}' , 'AdminPanelController@editslider')->name('editget.slider');
Route::post('/admin/edit/slider/image' , 'AdminPanelController@editsliderform')->name('edit.slider');


//Brand routes 
Route::get('/admin/brand' , 'AdminPanelController@brand')->name('brand');
Route::get('/admin/add/brand' , 'AdminPanelController@addbrand')->name('add.brand');
Route::post('/admin/add/brand' , 'AdminPanelController@addbrand')->name('add.brand');
Route::post('/admin/delet/brand' , 'AdminPanelController@deletbrand')->name('delete.brand');
Route::get('/admin/edit/brand/{id}' , 'AdminPanelController@editbrand')->name('editget.brand');
Route::post('/admin/edit/brand' , 'AdminPanelController@editbrandform')->name('edit.brand');


//Category routes
Route::get('/admin/categories' , 'AdminPanelController@category')->name('category');
Route::post('/admin/add/category' , 'AdminPanelController@addcatgory')->name('add.category');
Route::get('/admin/cat_json' , 'AdminPanelController@cat_json')->name('cat_json');
Route::post('/admin/change/category/parent' , 'AdminPanelController@changeparent')->name('change.parent');
Route::post('/admin/editcat', 'AdminPanelController@editcategory')->name('edit.category');


//Product routes
Route::get('/admin/products' , 'AdminPanelController@product')->name('product');
Route::get('/admin/add/product' , 'AdminPanelController@addproduct')->name('add.product');
Route::post('/admin/add/product' , 'AdminPanelController@addproduct')->name('add.product');
Route::get('/admin/edit/product' , 'AdminPanelController@editproduct')->name('edit.product');
Route::post('/admin/edit/product' , 'AdminPanelController@editproduct')->name('edit.product');
Route::post('/admin/delete/product' , 'AdminPanelController@deleteproduct')->name('delete.product');
Route::post('/ckeditor' , 'AdminPanelController@ckeditoruploader')->name('ckeditor.upload');
Route::post('/admin/edit/product' , 'AdminPanelController@editproduct')->name('edit.product');
Route::post('/admin/disable/product' , 'AdminPanelController@disableproduct')->name('disable.product');
Route::post('/admin/edit/info/product' , 'AdminPanelController@editinfoproduct')->name('edit.info.product');


