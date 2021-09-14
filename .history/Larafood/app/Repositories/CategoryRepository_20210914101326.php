<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {

    protected $categoryRepository;
    protected $tenantRepository;


    public function __construct(TenantRepositoryInterface $tenantRepository, CategoryRepositoryInterface $categoryRepository){
        $this->$categoryRepository = $categoryRepository;
        $this->$tenantRepository = $tenantRepository;
    }


    public function getCategoryByTenantUuid(string $uuid){
        return $this->entity->join('tenants','tenants.id','=','categories.id')
                            ->where('tenants.uuid',$uuid)
                            ->select('categories.*')
                            ->get();
    }

    public function getCategoryByTenantId(int $idTenant){
        return $this->entity->where('tenant_id',$idTenant)->get();
    }

   
}