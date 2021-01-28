<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => "App\Http\Controllers\API\\"], function () {
    Route::apiResource('/roles', 'RoleController');
    Route::apiResource('/articles', 'ArticleController');
    Route::post('/articles', 'ArticleController@store')->middleware('can:edit-panel');
});

Route::group(['middleware' => ['token']], function () {
    Route::get('/token', function (Request $request) {
        return Response()->json($request->all(), 200);
    });
});

Route::group(['namespace' => "App\Http\Controllers\API\Auth\\"], function () {
    Route::apiResource('/users', 'UserController');

    Route::post('/register', 'RegisterController@__invoke');
    Route::post('/login', 'LoginController@__invoke');
});


