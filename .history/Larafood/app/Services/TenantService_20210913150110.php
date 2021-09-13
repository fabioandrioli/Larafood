<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Facades\Hash;

class TenantService{

    private $plan;
    private $data;

    public function __construct(TenantServiceInterface $repository){

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