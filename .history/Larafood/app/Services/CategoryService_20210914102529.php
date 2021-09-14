<?php

namespace App\Services;

use App\Models\Category;
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
        $this->$categoryRepository = $categoryRepository;
        $this->$tenantRepository = $tenantRepository;
    }


    public function getCategoryByTenantUuid(string $uuid){
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        $this->categoryRepository->etCategoryByTenantId($tenant->id);
    }

    public function getCategoryByTenantId(int $idTenant){
        return $this->entity->where('tenant_id',$idTenant)->get();
    }
}