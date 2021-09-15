<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Api\V1\ClientService;

class AuthApiController extends Controller
{

    private $clientService;

    function public __construct(ClientService $clientService){
        $this->clientService = $clientService;
    }

    public function auth(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "device_name" => "required",
        ]);

        $client = Client:
    }
}
