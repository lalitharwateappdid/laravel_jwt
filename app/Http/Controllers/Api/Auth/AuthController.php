<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

// models
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            "password" => "required|string",
            "email" => "required|email"
        ]);

        $user = User::where("email",$request->email)->exists();

        if($user){

            if(Hash::check($request->password,$user->password)){
                $token = $user->createToken("user-token")->plainTextToken;

                return response([
                    "token" => $token,
                    "status" => true
                ],200);
            }
            else{
                return response([
                    "message" => "Password for given email is incorrect",
                    "status" => true
                ],400);
            }

        }
        else{
            $user = User::create([
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);

            $token = $user->createToken("user-login")->plainTextToken;

            return response([
                "token" => $token,
                "status" => true
            ],200);
        }
    }
}
