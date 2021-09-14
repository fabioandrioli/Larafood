<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;


class ProductRepository implements ProductRepositoryInterface {

    protected $table;


    public function __construct(){
        $this->table = 'products';
    }


    public function getProductByTenantUuid(string $uuid){
        return DB::table($this->table)
                        ->join('tenants','tenants.id','=','products.id')
                        ->where('tenants.uuid',$uuid)
                        ->select('products.*')
                        ->paginate();
    }

    public function getProductByTenantId(int $idTenant){
        return DB::table($this->table)
                        ->where('tenant_id',$idTenant)
                        ->get();
    }


    public function getProductByUrl(string $url){
        return DB::table($this->table)
        ->where('url',$url)
        ->first();
    }

   
}