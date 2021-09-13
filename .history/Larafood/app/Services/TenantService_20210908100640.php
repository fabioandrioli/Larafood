<?php

namespace App\Service;

use App\Models\Plan;
use Illuminate\Support\Str;

class TenantService{

    private $plan;
    private $data;

    public function __construct(Plan $plan, array $data){
        $this->plan = $plan;
        $this->data = $data;
    }

    public function make(){
        $tenant = $this->plan->tenants()->create([
            'cnpj' => $this->data['cnpj'],
            'name' =>  $this->data['empresa'],
            'url' =>   Str::kebab($this->data['empresa']),
            'email' =>  $this->data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
            'uuid' => '1',
        ]);

        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password']),
        ]);
    }

    public function createTenant(){

    }
}