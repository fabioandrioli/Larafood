<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Plan\StoreUpdateRoleRequest;

class RoleController extends Controller
{
    private $repository;

    public function __construct(Role $role){

        $this->repository = $role;
       
    }

    public function index(){

        $roles = $this->repository->latest()->paginate(10);
        return view('admin.pages.roles.index',compact('roles'));
    }

    public function create(){

        return view('admin.pages.roles.create_edit');
    }


    public function store(StoreUpdateRoleRequest $request){

        $this->repository->create($request->all());
        return redirect()->route('roles.index');
    }

    public function show($url){

        $role = $this->repository->where('url',$url)->first();

        if(!$role)
            return redirect()->back();

        return view('admin.pages.roles.show',compact('role'));
    }

    public function edit($url){

        $role = $this->repository->where('url',$url)->first();

        if(!$role)
            return redirect()->back();

        return view('admin.pages.roles.create_edit',compact('role'));

    }

    public function update($id, StoreUpdateRoleRequest $request){

        $role = $this->repository->find($id);

        if(!$role)
            return redirect()->back();

        $role->update($request->all());
        return redirect()->route('roles.index');
    }


    public function search(Request $request){

        $filters = $request->except('_token');
        $roles = $this->repository->search($request->filter);

        return view('admin.pages.roles.index',compact('roles','filters'));
    }

    public function destroy($url){
        
        $role = $this->repository->with('details')->where('url',$url)->first();
        if(!$role)
            return redirect()->back();
        
        if($role->details->count() > 0){
            return redirect()
                    ->back()
                    ->with('error', 'Existem detalhes vinculados a essa role, portanto não pode deletar');
        }

        $role->delete();
        return redirect()->route('roles.index');
    }
}
