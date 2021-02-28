<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/v1/register', function (Request $request) {
    //user registration 
});

Route::post('/v1/user-check', function (Request $request) {
    //admin verified
    $user = User::where('email', $request->email)->first();
    //additional condition check for validated or not .
    
    if(!$user){
        //new user resgiration procee
        //validated hudaina


        // negative .. user nabhako
        return response([
            'message' => 'User not found.',
            'error' => true
        ], 403);
    }

    //user found
    return response([
        'message' => 'Valid User '
    ]);
});
// 1 login  - /v1/login post request 
// 2 register /v1/register post 
// name , email, password



