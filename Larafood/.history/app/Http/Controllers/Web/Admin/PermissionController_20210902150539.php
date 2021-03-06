<?php

namespace App\Http\Controllers\Web\Admin;


use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\Permission\RequestStoreUpdateDetailPermission;

class PermissionController extends Controller
{

    
    private $repository;

    public function __construct(Permission $permission){

        $this->repository = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->latest()->paginate(10);
        return view('admin.pages.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreUpdateDetailPermission $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = $this->repository->find($id);

        if(!$permission)
            return redirect()->back();

        return view('admin.pages.permissions.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->find($id);

        if(!$permission)
            return redirect()->back();

        return view('admin.pages.permissions.create_edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUpdateDetailPermission$request,$id)
    {
        $permission = $this->repository->find($id);

        if(!$permission)
            return redirect()->back();

        $permission->update($request->all());
        return redirect()->route('permissions.index');
    }


    public function search(Request $request){

        $filters = $request->except('_token');
        $permissions = $this->repository->search($request->filter);

        return view('admin.pages.permissions.index',compact('permissions','filters'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->repository->find($id);
        if(!$permission)
            return redirect()->back();

        $permission->delete();
    }
}
