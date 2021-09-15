<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function auth(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "device_name" => "required",
        ]);
    }
}
