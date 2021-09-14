<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryService{

    private $categoryRepository;
    private $tenantRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->$categoryRepository = $categoryRepository;
        $this->$tenantRepository; = $tenantRepository;
    }


    public function getAllCategorys(int $per_page){
        return $this->repository->getAllCategorys($per_page);
    }

    public function getCategoryByUuid(string $uuid){
       return $this->repository->getCategoryByUuid($uuid);
    }

    public function make(Plan $plan, array $data){
        $this->plan = $plan;
        $this->data = $data;

        $tenant = $this->createCategory();
        return $this->createUser($tenant);
       
    }

    public function createCategory(){
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