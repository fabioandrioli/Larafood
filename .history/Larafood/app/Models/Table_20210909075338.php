<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id',
        'uuid',
        'identify',
        'description',
    ];

    public function search($filter = null){
        return $results = $this
                    ->where('description','LIKE',"%{$filter}%")
                    ->orWhere('uuid','LIKE',"%{$filter}%")
                    ->latest()
                    ->paginate();
    }
}
