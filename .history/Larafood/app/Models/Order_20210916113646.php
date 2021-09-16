<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Order extends Model
{
    use HasFactory,TenantTrait;

    
    protected $fillable = [
        "name",
        "url",
        "description",
        "tenant_id",
    ];
}
