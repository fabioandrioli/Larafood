<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function search($filter = null){
        return $results = $this
                    ->where('name','LIKE',"%{$filter}%")
                    ->orWhere('description','LIKE',"%{$filter}%")
                    ->paginate();
    }


    public function permissionsAvailable($filter = null){
        $permissions = Permission::whereNotIn('permissions.id',function($query){
            $query->select("permission_role.permission_id");
            $query->from("permission_role");
            $query->whereRaw("role_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('permissions.name','LIKE',"%{$filter}%");
        })
        ->paginate();
        return $permissions;
    }
}
