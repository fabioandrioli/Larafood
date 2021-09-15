<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\Api\V1\ClientRepositoryInterface;


class ClientService{

    private $clientRepository;
    private $tenantRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        TenantRepositoryInterface $tenantRepository
    ){
        $this->clientRepository = $productRepository;
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