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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add', 'BookController@addPage')->name('addPage');
Route::post('/addBook', 'BookController@addBook')->name('addBook');

Route::get('/take', 'BookController@take')->name('take');
Route::post('/take', 'BookController@searchBook')->name('searchBook');
Route::post('/takeBook', 'BookController@takeBook')->name('takeBook');

Route::get('/return', 'BookController@return')->name('return');
Route::post('/returnBook', 'BookController@returnBook')->name('returnBook');

Route::get('/user', 'UserController@user')->name('user');
Route::post('/saveUser', 'UserController@saveUser')->name('saveUser');