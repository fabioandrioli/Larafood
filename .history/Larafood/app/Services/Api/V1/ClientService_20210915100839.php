<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\Api\V1\ClientRepositoryInterface;


class ClientService{

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository){
        $this->clientRepository = $clientRepository;
    }


    public function createNewClient(array $data){
        return $this->clientRepository->createNewClient($data);
    }

    public function getClient(int $id){
        return $this->clientRepository->getClient($id);
    }

}