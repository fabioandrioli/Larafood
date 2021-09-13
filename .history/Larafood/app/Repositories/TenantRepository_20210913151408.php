<?php

namespace App\Repositories;

class TenantRepository implements TenantRepositoryInterface {

    protected $entity;


    public function __construct(Tenant $tenant){
        $this->entity = $tenant;
    }


    public function getAllTenants(){
        $this->all();
    }
}