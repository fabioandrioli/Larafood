<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface {

    public function getProductByTenantId(int $idTenant, array $categories);
    public function getProductByUuid(string $identify);

}