<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Permission;

class ProfilePermissionController extends Controller
{
    private $profile;
    private $permission;

    public function __construct(Profile $profile, Permission $permission){

        $this->$profile = $profile;
        $this->$permission = $permission;
    }

    public function profiles($id){

        $profile = Profile::find($id);
        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permission.index',compact('profile','permissions'));
    }

    public function permissions($id){

        $permission = Permission::find($id);
        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profile.index',compact('permission','profiles'));
    }

    public function linkNewPermission($id){
        if($profile = Profile::find($id)){
            return redirect()->back();
        }

        $permissions = $profile->permissions->paginate();

        return view('admin.pages.profiles.permission.linkNewPermission','profile','permissions');
    }

    public function linkNewProfile($id){
     
        if($permission = Permission::find($id)){
            dd($permission);
            return redirect()->back();
        }
        $profiles = $this->permission->profiles()->paginate();
        return view('admin.pages.permissions.profile.linkNewProfile','profiles','permission');
    }
}
