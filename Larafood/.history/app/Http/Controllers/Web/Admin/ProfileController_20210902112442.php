<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    private $repository;

    public function __construct(Profile $profile){

        $this->repository = $profile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->latest()->paginate(10);
        return view('admin.pages.profiles.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $profile = $this->repository->find($id);

        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.show',compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $profile = $this->repository->find($id);

        if(!$profile)
            return redirect()->back();

        return view('admin.pages.profiles.create_edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile = $this->repository->find($id);

        if(!$profile)
            return redirect()->back();

        $profile->update($request->all());
        return redirect()->route('profiles.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');
        $profiles = $this->repository->search($request->filter);

        return view('admin.pages.profiles.index',compact('profiles','filters'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile = $this->repository->with('details')->where('url',$url)->first();
        if(!$profile)
            return redirect()->back();
        
        if($profile->details->count() > 0){
            return redirect()
                    ->back()
                    ->with('error', 'Existem detalhes vinculados a esse profileo, portanto não pode deletar');
        }

        $profile->delete();
        return redirect()->route('profiles.index');
    }
}
