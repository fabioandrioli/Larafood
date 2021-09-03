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

        $permission = $this->$permission->find($id);

        return view('admin.pages.permissions.profile.index',compact('permission'));
    }

    public function permissions($id){

        $profile= $this->$profile->find($id);

        return view('admin.pages.profiles.permission.index',compact('profile'));
    }
}
