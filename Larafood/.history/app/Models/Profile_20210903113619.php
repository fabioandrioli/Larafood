<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    public function search($filter = null){
        return $results = $this
                    ->where('name','LIKE',"%{$filter}%")
                    ->orWhere('description','LIKE',"%{$filter}%")
                    ->paginate();
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function permissionsAvailable(){
        $permissions = $this->where('')->paginate();
        return $permissions;
    }
}
