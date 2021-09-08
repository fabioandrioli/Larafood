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
}
