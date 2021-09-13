<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    User,
    Role,
};

class UserRoleController extends Controller
{
    private $user;
    private $role;

    public function __construct(User $user, Role $role){

        $this->$user = $user;
        $this->$role = $role;
    }

    public function users($id){

        $user = User::find($id);
        $roles = $user->roles()->paginate();

        return view('admin.pages.users.role.index',compact('user','roles'));
    }

    public function roles($id){

        $role = Role::find($id);
        $users = $role->users()->paginate();

        return view('admin.pages.roles.user.index',compact('role','users'));
    }

    public function linkNewRole(Request $request,$id){
        $user = User::find($id);
    
        if(!$user){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $roles = $user->rolesAvailable($request->filter);

        return view('admin.pages.users.role.linkNewRole',compact('user','roles','filters'));
    }

    public function linkNewRoleStore(Request $request, $id){
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

    public function unbindRole($idUser, $idRole){
        $user = User::find($idUser);
        $role = Role::find($idRole);
        if(!$user || !$role){
            return redirect()->back();
        }

        $user->roles()->detach($role);
        return redirect()->route("users.roles", $user->id);
    }
}
