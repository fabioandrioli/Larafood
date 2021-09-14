<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;


class ProductRepository implements ProductRepositoryInterface {

    protected $table;


    public function __construct(){
        $this->table = 'products';
    }


    public function getProductByTenantId(int $idTenant, array $categories){
        return DB::table($this->table)
                        ->join('category_product','category_product.product_id','=','products.id')
                        ->join('categories','category_product.category_id','=','categories.id')
                        ->where('tenant_id',$idTenant)
                        ->get();
    }



   
}