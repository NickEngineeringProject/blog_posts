<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\AuthLogController;

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

Route::group(['middleware' => ['token']], function () {
    Route::get('/test', function (Request $request) {
        return Response()->json($request->all(), 200);
    });
});

Route::group(['namespace' => "App\Http\Controllers\API\Auth\\"], function () {
    Route::post('/register', 'RegisterController@__invoke');
    Route::post('/login', 'LoginController@__invoke');
});

Route::apiResource('/users', UserController::class);




