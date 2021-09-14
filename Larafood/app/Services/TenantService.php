<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantService{

    private $plan;
    private $data;
    private $repository;

    public function __construct(TenantRepositoryInterface $repository){
        $this->repository = $repository;
    }


    public function getAllTenants(){
        return $this->repository->getAllTenants();
    }

    public function getTenantByUuid(string $uuid){
        $this->repository->getTenantByUuid($uuid);
    }

    public function make(Plan $plan, array $data){
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->createTenant();
        return $this->createUser($tenant);
       
    }

    public function createTenant(){
        return  $this->plan->tenants()->create([
            'cnpj' => $this->data['cnpj'],
            'name' =>  $this->data['empresa'],

            'email' =>  $this->data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
            'uuid' => '1',
        ]);
    }

    public function createUser($tenant){
        return  $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password']),
        ]);
    }
}