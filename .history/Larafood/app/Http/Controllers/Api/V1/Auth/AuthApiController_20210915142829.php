<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Api\V1\ClientService;
use Illuminate\Support\Facades\Hash;

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

        if(!$client || !Hash::check($request->password, $client->password) ){
            return response()->json(['message' => 'Client Not Found']);
        }

        $token = $client->createToken($request->device_name)->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function me(Request $request)
    {
        $client = $request->user();

        return new ClientResource($client);
    }

    public function logout(Request $request)
    {
        $client = $request->user();

        // Revoke all tokens client...
        $client->tokens()->delete();

        return response()->json([], 204);
    }
}
