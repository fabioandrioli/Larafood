<?php

namespace App\Repositories\Contracts\Api\V1;

interface ClientRepositoryInterface {

    public function createNewClient(array $data);
    public function getClient(int $id);
}