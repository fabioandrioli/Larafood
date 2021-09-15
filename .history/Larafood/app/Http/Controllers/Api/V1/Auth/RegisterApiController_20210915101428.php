<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Client\RequestStoreClient;
use App\Services\Api\V1\ClientService;

class RegisterApiController extends Controller
{
    
    private $clientService;

    public function __construct(ClientService $clientService){
        $this->$clientService = $clientService;
    }

    public function store(RequestStoreClient $request){

    }
}
