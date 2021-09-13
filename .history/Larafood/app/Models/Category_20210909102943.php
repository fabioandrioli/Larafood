<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "url",
        "description",
        "tenant_id",
    ];

    //reescrevendo o metodo booted do scope para usar um observe específico.
    public function booted(){

    }

    public function search($filter = null){
        return $results = $this
                    ->where('name','LIKE',"%{$filter}%")
                    ->orWhere('description','LIKE',"%{$filter}%")
                    ->paginate();
    }


    public function productsAvailable($filter = null){
        $products = Product::whereNotIn('products.id',function($query){
            $query->select("category_product.product_id");
            $query->from("category_product");
            $query->whereRaw("product_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('products.name','LIKE',"%{$filter}%");
        })
        ->paginate();
        return $products;
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function tenants(){
        return $this->belongsTo(Tenant::class);
    }
}
