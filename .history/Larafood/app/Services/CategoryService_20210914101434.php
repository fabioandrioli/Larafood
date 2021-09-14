<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryService{

    private $plan;
    private $data;
    private $repository;

    public function __construct(CategoryRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function getCategoryByUuid(string $uuid){
       return $this->repository->getCategoryByUuid($uuid);
    }

}