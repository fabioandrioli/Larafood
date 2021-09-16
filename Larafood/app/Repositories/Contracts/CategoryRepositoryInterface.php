<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface {

    public function getCategoryByTenantUuid(string $uuid);
    public function getCategoryByTenantId(int $idTenant);
    public function getCategoryByUuid(string $identify);

}