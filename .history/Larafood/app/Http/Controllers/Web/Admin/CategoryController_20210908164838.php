<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\category\RequestStoreUpdateCategory;

class CategoryController extends Controller
{


    private $repository;

    public function __construct(Category $category){

        $this->repository = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = $this->repository->latest()->paginate(10);
        return view('admin.pages.categorys.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categorys.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreUpdatecategory $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('categorys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $category = $this->repository->find($id);

        if(!$category)
            return redirect()->back();

        return view('admin.pages.categorys.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->repository->find($id);

        if(!$category)
            return redirect()->back();

        return view('admin.pages.categorys.create_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUpdatecategory $request,$id)
    {
        $category = $this->repository->find($id);

        if(!$category)
            return redirect()->back();

        $category->update($request->all());
        return redirect()->route('categorys.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');
        $categorys = $this->repository->search($request->filter);

        return view('admin.pages.categorys.index',compact('categorys','filters'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->repository->find($id);
        if(!$category)
            return redirect()->back();
    

        $category->delete();
        return redirect()->route('categorys.index');
    }
}
