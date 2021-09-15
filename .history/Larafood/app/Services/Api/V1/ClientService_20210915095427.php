<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\Api\V1\ClientRepositoryInterface;


class ClientService{

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

    public function getProductByFlag($flag){
        return $this->productRepository->getProductByFlag($flag);
    }

}