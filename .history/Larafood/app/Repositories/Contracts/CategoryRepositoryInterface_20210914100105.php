<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface {

    public function getCategoryByTenantUuid(string $uuid);

}