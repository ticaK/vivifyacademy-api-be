<?php

use Illuminate\Http\Request;

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
// Route::get('contacts','ContactsController@index');
//posto nam treba vise metoda koristicemo resource

Route::resource('contacts','ContactsController')->middleware('auth:api');
//sa ovim middle smo zaklucali kontakte

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'
    // kada hocemo da se ulogujemo moramo da gadjamo api/auth/login

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    //kada je token pri isteku da se 
    Route::post('me', 'AuthController@me');

});

