<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Api\V1\ClientService;

class AuthApiController extends Controller
{

    private $clientService;

    public function __construct(ClientService $clientService){
        $this->clientService = $clientService;
    }

    public function auth(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "device_name" => "required",
        ]);

        $client = $this->clientService->getClientByEmail($request->email);

        if(!$client || Hash::check($request->email, $email) ){
            return response()->json(['message' => 'Client Not Found']);
        }
    }
}
