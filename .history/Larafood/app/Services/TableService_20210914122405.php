<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService{

    private $categoryRepository;
    private $tenantRepository;

    public function __construct(
        TableRepositoryInterface $categoryRepository,
        TenantRepositoryInterface $tenantRepository
    ){
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository = $tenantRepository;
    }


    public function getTableByTenantUuid(string $uuid){
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->categoryRepository->getTableByTenantId($tenant->id);
    }

    public function getTableByUrl(string $url){
        return $this->categoryRepository->getTableByUrl($url);
    }
}