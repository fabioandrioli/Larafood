<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface {

    public function getProductByTenantUuid(string $uuid);
    public function getProductByTenantId(int $idTenant);
    public function getProductByUrl(string $url);

}