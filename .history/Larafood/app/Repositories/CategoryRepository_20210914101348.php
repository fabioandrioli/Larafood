<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {

    protected $categoryRepository;
    protected $tenantRepository;


    public function __construct(
        TenantRepositoryInterface $tenantRepository, 
        CategoryRepositoryInterface $categoryRepository
    ){

        $this->$categoryRepository = $categoryRepository;
        $this->$tenantRepository = $tenantRepository;
    }

   
}