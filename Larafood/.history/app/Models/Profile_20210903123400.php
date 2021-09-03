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

    public function permissionsAvailable($filter = null){
        $permissions = Permission::whereNotIn('permissions.id',function($query){
            $query->select("permission_profile.permission_id");
            $query->from("permission_profile");
            $query->whereRaw("profile_id={$this->id}");
        })
        ->where(function(queryFilter) use ($filter){
            
        })
        ->paginate();
        return $permissions;
    }
}
