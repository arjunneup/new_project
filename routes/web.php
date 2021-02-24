<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    //return view('welcome');
});
*/

Route::get('/user', 'UsersController@allList')->name('main');
Route::get('/users', 'UsersController@index');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/{users}', 'UsersController@edit')->name('users.edit');
Route::put('/users/{users}', 'UsersController@update')->name('users.update');

Route::delete('/users/{users}', 'UsersController@destroy')->name('users.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google','Auth\LoginController@redirectToProvider');
Route::get('/auth/google/callback', 'Auth\LoginController@handleProviderCallback');



