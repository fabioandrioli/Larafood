<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryService{

    private $categoryRepository;
    private $tenantRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        TenantRepositoryInterface $tenantRepository
    ){
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository = $tenantRepository;
    }


    public function getCategoryByTenantUuid(string $uuid){
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->categoryRepository->getCategoryByTenantId($tenant->id);
    }

    public function getCategoryByTenantId(int $idTenant){
        return $this->categoryRepository->where('tenant_id',$idTenant)->get();
    }

    public function getCategoryByUrl(string $url){
        return $this->categoryRepository->where('url',$url)->get();
    }
}