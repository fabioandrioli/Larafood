<?php

namespace App\Repositories;

use App\Models\Tenant;
use  App\Repositories\Contracts\TenantRepositoryInterface;

class TenantRepositor {

    protected $entity;


    public function __construct(Tenant $tenant){
        $this->entity = $tenant;
    }


    public function getAllTenants(){
        return $this->all();
    }
}