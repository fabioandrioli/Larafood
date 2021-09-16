<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface {

    public function getProductByTenantId(int $idTenant, array $categories);
    public function getProductByIdentify(string $flag);

}