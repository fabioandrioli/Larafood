<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'cnpj',
        'name',
        'url',
        'email',
        'logo',
        'active',
        'subscription',
        'expires_at',
        'subscription_id',
        'subscription_active',
        'subscription_suspended',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function plans(){
        return $this->belongsTo(Plan::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
