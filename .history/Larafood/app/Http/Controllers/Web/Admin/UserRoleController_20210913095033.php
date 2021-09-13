<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    User,
    Role,
};

class UserUserController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Permission $role){

        $this->$user = $user;
        $this->$role = $role;
    }

    public function users($id){

        $user = User::find($id);
        $roles = $user->roles()->paginate();

        return view('admin.pages.users.role.index',compact('user','roles'));
    }

    public function roles($id){

        $role = Permission::find($id);
        $users = $role->users()->paginate();

        return view('admin.pages.roles.user.index',compact('role','users'));
    }

    public function linkNewPermission(Request $request,$id){
        $user = User::find($id);
    
        if(!$user){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $roles = $user->rolesAvailable($request->filter);

        return view('admin.pages.users.role.linkNewPermission',compact('user','roles','filters'));
    }

    public function linkNewPermissionStore(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return redirect()->back();
        }

        if(!$request->roles || count($request->roles) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos um cargo");
        }

        $user->roles()->attach($request->roles);

        return redirect()->route("users.roles", $user->id);
    }

    public function unbindPermission($idUser, $idPermission){
        $user = User::find($idUser);
        $role = Permission::find($idPermission);
        if(!$user || !$role){
            return redirect()->back();
        }

        $user->roles()->detach($role);
        return redirect()->route("users.roles", $user->id);
    }
}
