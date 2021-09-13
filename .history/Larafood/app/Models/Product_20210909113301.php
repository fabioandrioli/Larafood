<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;
class Product extends Model
{
    use HasFactory;
    use TenantTrait;
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

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
  
}
