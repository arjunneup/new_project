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

*/

#here, usercontroller is the admin
Route::middleware(['auth'])->group(function () {
    Route::get('/user', 'UsersController@allList')->name('main');
    Route::get('/users', 'UsersController@index')->name('users.welcome');
    Route::post('/users', 'UsersController@store')->name('users.store');
    Route::get('/users/{users}', 'UsersController@edit')->name('users.edit');
    Route::put('/users/{users}', 'UsersController@update')->name('users.update');
    Route::delete('/users/{users}', 'UsersController@destroy')->name('users.delete');

    Route::get('/user/{user}/status', 'UserStatusController@edit')->name('user.status');
    Route::put('/user/{user}/status', 'UserStatusController@update')->name('user.status.update');

    //Route::get('/', 'HomeController@approval')->name('users.status.approval');

    //Route::get('/home', 'HomeController@index')->name('home');

});





Auth::routes();

Route::get('auth/google', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/google/callback', 'Auth\LoginController@handleProviderCallback');

//Adminn and  Company routes


//Route::get('/admin', 'AdminController@index')->name('admin');

//Route::get('/company', 'CompanyController@allList')->name('company');
//Route::get('/companies', 'CompanyController@index');
//Route::post('/companies', 'CompanyController@store')->name('companies.store');
//Route::get('/company/{company}', 'CompanyController@edit')->name('company.edit');
//Route::put('/company/{company}', 'CompanyController@update')->name('company.update');
