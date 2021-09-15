<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Contracts\Api\V1\ClientRepositoryInterface;
use App\Models\Client;


class ClientRepository implements ClientRepositoryInterface {

    private $client;


    public function __construct(Client $client){
        $this->$client = $client;
    }


    public function createNewClient(array $data){
        return $this->client->create($data);
    }

    public function getClient(int $id){
        return $this->client->find($id);
    }

}