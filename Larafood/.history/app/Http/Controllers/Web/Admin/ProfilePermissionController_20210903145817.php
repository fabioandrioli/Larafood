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

    public function linkNewPermission(Request $request,$id){
        $profile = Profile::find($id);
    
        if(!$profile){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permission.linkNewPermission',compact('profile','permissions','filters'));
    }

    public function linkNewProfile($id){
        $permission = Permission::find($id);
        if(!$permission ){
            return redirect()->back();
        }

        $profiles = Profile::paginate();
        return view('admin.pages.permissions.profile.linkNewProfile',compact('profiles','permission'));
    }

    public function linkNewPermissionStore(Request $request, $id){
        $profile = Profile::find($id);
        if(!$profile){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos uma permissão");
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route("profiles.permissions", $profile->id);
    }

    public function unbindPermission($idProfile, $idPermission){
        $profile = Profile::find($idProfile);
        $permission = Permission::find($idPermission);
        if(!$profile || !permission){
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);
        return redirect()->route("profiles.permissions", $profile->id);
    }

}
