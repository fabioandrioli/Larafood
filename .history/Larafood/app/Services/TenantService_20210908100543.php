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
        $tenant = $plan->tenants()->create([
            'cnpj' => $data['cnpj'],
            'name' =>  $data['empresa'],
            'url' =>   Str::kebab($data['empresa']),
            'email' =>  $data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
            'uuid' => '1',
        ]);

        $user = $tenant->users()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function createTenant(array $data){

    }
}