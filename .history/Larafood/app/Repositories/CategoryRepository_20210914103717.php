<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;


class CategoryRepository implements CategoryRepositoryInterface {

    protected $db;


    public function __construct(){
        $this->db = 'categories';
    }


    public function getCategoryByTenantUuid(string $uuid){
        return $this->entity->join('tenants','tenants.id','=','categories.id')
                            ->where('tenants.uuid',$uuid)
                            ->select('categories.*')
                            ->get();
    }

    public function getCategoryByTenantId(int $idTenant){
        return $this->entity->where('tenant_id',$idTenant)->get();
    }

   
}