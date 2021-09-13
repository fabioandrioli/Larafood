<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'title',
        'flag',
        'image',
        'price', 
        'description',
        'tenant_id',
    ];

    public function tenants(){
        return $this->belongsTo(Tenant::class);
    }

    public function search($filter = null){
        return $results = $this
                    ->where('title','LIKE',"%{$filter}%")
                    ->orWhere('uuid','LIKE',"%{$filter}%")
                    ->latest()
                    ->paginate();
    }

    public function productsAvailable($filter = null){
        $products = Permission::whereNotIn('products.id',function($query){
            $query->select("category_product.product_id");
            $query->from("category_product");
            $query->whereRaw("profile_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('products.name','LIKE',"%{$filter}%");
        })
        ->paginate();
        return $products;
    }
}
