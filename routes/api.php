<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/login',[AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::group([
        'middleware' => 'auth:api'
      ], function() {
          Route::get('logout', 'Auth\AuthController@logout');
          Route::get('user', 'Auth\AuthController@user');
      });
});
