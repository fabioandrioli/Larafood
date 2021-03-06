<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\UserACLTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

      /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantUser(Builder $query)
    {
        $user = Auth::user();
        return $query->where('tenant_id', $user->tenant_id);
    }

    public function search($filter = null){
        return $results = $this
                    ->where('name','LIKE',"%{$filter}%")
                    ->orWhere('email','LIKE',"%{$filter}%")
                    ->latest()
                    ->tenantUser()
                    ->paginate();
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function rolesAvailable($filter = null){
        $roles = Permission::whereNotIn('roles.id',function($query){
            $query->select("role_user.role_id");
            $query->from("role_user");
            $query->whereRaw("role_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter)
                $queryFilter->where('roles.name','LIKE',"%{$filter}%");
        })
        ->paginate();
        return $roles;
    }

}
