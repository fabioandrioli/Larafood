<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Table extends Model
{
    use HasFactory;
    use TenantTrait;
    
    protected $fillable = [
        'tenant_id',
        'uuid',
        'identify',
        'description',
    ];

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function search($filter = null){
        return $results = $this
                    ->where('description','LIKE',"%{$filter}%")
                    ->orWhere('uuid','LIKE',"%{$filter}%")
                    ->latest()
                    ->paginate();
    }
}
