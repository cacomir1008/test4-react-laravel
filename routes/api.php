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

// ユーザー情報表示API
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// トークン更新API(必要な時に叩けばトークン情報が変わる)
Route::get('/tokenupdate','ApiTokenController@update');


// ログインユーザーのCondition情報取得API
// Route::middleware('auth:api')->group(function() {
//     Route::resource('conditions', 'ConditionController');
// });

Route::middleware('auth:api')->group(function() {
    Route::get('/conditions/userinfo','ConditionController@userinfo');
});

// 全ユーザーとCondition情報取得API
Route::get('/allinfo', 'ConditionController@allinfo');
