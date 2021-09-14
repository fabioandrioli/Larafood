<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService{

    private $tableRepository;
    private $tenantRepository;

    public function __construct(
        TableRepositoryInterface $tableRepository,
        TenantRepositoryInterface $tenantRepository
    ){
        $this->tableRepository = $tableRepository;
        $this->tenantRepository = $tenantRepository;
    }


    public function getTableByTenantUuid(string $uuid){
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->tableRepository->getTableByTenantId($tenant->id);
    }

    public function getTableByIdentify(string $identify){
        return $this->tableRepository->getTableByIdentify($identify);
    }
}