<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Contracts\Api\V1\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;


class ClientRepository implements ClientRepositoryInterface {

    protected $table;


    public function __construct(){
        $this->table = 'products';
    }


    public function createNewClient(array $data){
        return DB::table($this->table)
                        ->join('category_product','category_product.product_id','=','products.id')
                        ->join('categories','category_product.category_id','=','categories.id')
                        ->where('products.tenant_id',$idTenant)
                        ->where('categories.tenant_id',$idTenant)
                        ->where(function($query) use ($categories){
                            if($categories != [])
                                $query->whereIn('categories.url',$categories);
                        })
                        ->get();
    }



   
}