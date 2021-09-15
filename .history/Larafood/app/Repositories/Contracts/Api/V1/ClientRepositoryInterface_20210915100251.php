<?php

namespace App\Repositories\Contracts\Api\V1;

interface ClientRepositoryInterface {

    public function getProductByTenantId(array $data);
}