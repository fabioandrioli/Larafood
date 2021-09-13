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
                    ->where('name','LIKE',"%{$filter}%")
                    ->orWhere('uuid','LIKE',"%{$filter}%")
                    ->latest()
                    ->paginate();
    }
}
