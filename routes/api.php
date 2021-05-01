<?php

use App\Condition;
use App\Http\Controllers\ConditionController;
use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user	', function (Request $request) {
	return $request->user();
});

// 新規登録
Route::post('/register', 'UsersController@register');
// ログイン
Route::post('/login', 'UsersController@login');
// ログアウト
Route::post('/logout','UsersController@logout');

Route::get('/',function (Request $request) {
	
	$users = App\User::all();	
	return response()->json(['users' => $users]);
	
});

Route::middleware('auth:api')->group(function() {
	Route::get('user', 'UsersController@details');
	Route::resource('conditions', 'ConditionController');
});