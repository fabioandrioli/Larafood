<?php

namespace App\Repositories\Contracts;

interface TenantRepositoryInterface {

    public function getCategoryByTenantUuid(string uuid);

}