<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::middleware("auth:sanctum")->group(function(){
    Route::controller(AuthController::class)->prefix("auth")->group(function(){
        Route::get("login","login");
    });


    Route::controller(UserController::class)->prefix("users")->group(function(){
        Route::get("/","profile");
    });
});

Route::get("/test",function(){
    return response([
        "message" => "Server is Up and Running"
    ]);
});
