<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return response([
            "data" => auth()->user,
            "status" => true
        ],200);
    }
}
