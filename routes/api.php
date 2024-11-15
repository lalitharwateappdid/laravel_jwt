<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::middleware("auth:sanctum")->group(function(){
    Route::controller(AuthController::class)->prefix("auth")->group(function(){
        Route::get("login","login");
    });
});

Route::get("/test",function(){
    return response([
        "message" => "Server is Up and Running"
    ]);
});
