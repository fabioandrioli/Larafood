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
        $profile = Profile::find($id);
        if(!$profile){
            return redirect()->back();
        }

      

        return view('admin.pages.profiles.permission.linkNewPermission',compact('profile','permissions'));
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

        $filters = $request->except('_token');


        $permissions = $profile->permissionsAvailable($request->filters);

        $profile->permissions()->attach($request->permissions);

        return redirect()->route("profiles.permissions", $profile->id);
    }

}
