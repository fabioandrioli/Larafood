<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Http\Requests\tenant\RequestStoreUpdateTenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    
    public function __construct(Tenant $tenant){

        $this->repository = $tenant;
        $this->middleware(['can:Tenants']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tenants = $this->repository->latest()->paginate(10);
        return view('admin.pages.tenants.index',compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tenants.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreUpdateTenant $request)
    {

        $data = $request->all();
        $user = Auth::user();
        $tenant = $user->tenant;

        if($request->hasFile('image') && $request->image->isValid()){
            $data["image"] = $request->image->store("tenants/{$tenant->uuid}/tenants",'public');
        }

        // dd($data);

        $this->repository->create($data);
        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $tenant = $this->repository->find($id);

        if(!$tenant)
            return redirect()->back();

        return view('admin.pages.tenants.show',compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenant = $this->repository->find($id);

        if(!$tenant)
            return redirect()->back();

        return view('admin.pages.tenants.create_edit',compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUpdatetenant $request,$id)
    {
        $tenant = $this->repository->find($id);

        if(!$tenant)
            return redirect()->back();

        $data = $request->all();
        $user = Auth::user();
        $tenant = $user->tenant;
        if($request->hasFile('image') && $request->image->isValid()){

            if (Storage::exists($tenant->image)) {
                Storage::delete($tenant->image);
            }

            $data["image"] = $request->image->store("tenants/{$tenant->uuid}/tenants",'public');
        }
        $tenant->update($data);
        return redirect()->route('tenants.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');
       $tenants = $this->repository->search($request->filter);

        return view('admin.pages.tenants.index',compact('tenants','filters'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        if (Storage::exists($tenant->image)) {
            Storage::delete($tenant->image);
        }

        $tenant->delete();

        return redirect()->route('tenants.index');
    }
}
