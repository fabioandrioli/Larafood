<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    
    public function search($filter = null){
        return $results = $this
                    ->where('name','LIKE',"%{$filter}%")
                    ->orWhere('description','LIKE',"%{$filter}%")
                    ->paginate();
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }
}