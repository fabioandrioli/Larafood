<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;


class CategoryRepository implements CategoryRepositoryInterface {

    protected $table;


    public function __construct(){
        $this->table = 'categories';
    }


    public function getCategoryByTenantUuid(string $uuid){
        return DB::table($this->table)
                        ->join('tenants','tenants.id','=','categories.id')
                        ->where('tenants.uuid',$uuid)
                        ->select('categories.*')
                        ->paginate();
    }

    public function getCategoryByTenantId(int $idTenant){
        return DB::table($this->table)
                        ->where('tenant_id',$idTenant)
                        ->get();
    }


    public function getCategoryByUrl(string $url){
        return DB::table($this->table)
        ->where('url',$url)
        ->get();
    }

   
}