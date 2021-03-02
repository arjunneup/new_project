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

Route::get('/',function(){
    return redirect()->route('login');
});
*/

#here, usercontroller is the admin
Route::get('/user', 'UsersController@allList')->name('main')->middleware('user');
Route::get('/users', 'UsersController@index')->middleware('user');
Route::post('/users', 'UsersController@store')->name('users.store')->middleware('user');
Route::get('/users/{users}', 'UsersController@edit')->name('users.edit')->middleware('user');
Route::put('/users/{users}', 'UsersController@update')->name('users.update');

Route::delete('/users/{users}', 'UsersController@destroy')->name('users.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
Route::get('auth/google','Auth\LoginController@redirectToProvider');
Route::get('/auth/google/callback', 'Auth\LoginController@handleProviderCallback');

//Adminn and  Company routes


Route::get('/admin','AdminController@index')->name('admin')->middleware('admin');

Route::get('/company', 'CompanyController@allList')->name('company')->middleware('company');
Route::get('/companies','CompanyController@index')->middleware('company');
Route::post('/companies', 'CompanyController@store')->name('company.store')->middleware('company');


Route::get('/company/{company}', 'CompanyController@edit')->name('company.edit')->middleware('company');
Route::put('/company/{company}', 'CompanyController@update')->name('company.update')->middleware('company');
Route::delete('/company/{company}', 'CompanyController@destroy')->name('company.delete');

