<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Plan\StoreUpdateRoleRequest;

class RolePermissionController extends Controller
{
    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission){

        $this->$role = $role;
        $this->$permission = $permission;
    }

    public function roles($id){

        $role = Role::find($id);
        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permission.index',compact('role','permissions'));
    }

    public function permissions($id){

        $permission = Permission::find($id);
        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.role.index',compact('permission','roles'));
    }

    public function linkNewPermission(Request $request,$id){
        $role = Role::find($id);
    
        if(!$role){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $permissions = $role->permissionsAvailable($request->filter);

        return view('admin.pages.roles.permission.linkNewPermission',compact('role','permissions','filters'));
    }

    public function linkNewPermissionStore(Request $request, $id){
        $role = Role::find($id);
        if(!$role){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos uma permissão");
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route("roles.permissions", $role->id);
    }

    public function unbindPermission($idRole, $idPermission){
        $role = Role::find($idRole);
        $permission = Permission::find($idPermission);
        if(!$role || !$permission){
            return redirect()->back();
        }

        $role->permissions()->detach($permission);
        return redirect()->route("roles.permissions", $role->id);
    }
