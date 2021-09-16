<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ProductService{

    private $productRepository;
    private $tenantRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        TenantRepositoryInterface $tenantRepository
    ){
        $this->productRepository = $productRepository;
        $this->tenantRepository = $tenantRepository;
    }


    public function getProductByTenantUuid(string $uuid, array $categories){
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->productRepository->getProductByTenantId($tenant->id,$categories);
    }

    public function  getProductByUuid($flag){
        return $this->productRepository->getProductByIdentify($flag);
    }

}