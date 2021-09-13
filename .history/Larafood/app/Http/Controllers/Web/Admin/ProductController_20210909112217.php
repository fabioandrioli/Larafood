<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $repository;

    public function __construct(Product $product){

        $this->repository = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = $this->repository->latest()->paginate(10);
        return view('admin.pages.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreUpdateProduct $request)
    {

        
        $this->repository->create( $request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $product
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        
        $product = $this->repository->where('url',$url)->first();

        if(!$product)
            return redirect()->back();

        return view('admin.pages.products.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        $product = $this->repository->where('url',$url)->first();

        if(!$product)
            return redirect()->back();

        return view('admin.pages.products.create_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $product
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUpdatecategory $request,$url)
    {
        $product = $this->repository->where('url',$url)->first();

        if(!$product)
            return redirect()->back();

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');
       $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index',compact('products','filters'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        $product = $this->repository->where('url',$url)->first();
        if(!$product)
            return redirect()->back();
    

        $product->delete();
        return redirect()->route('products.index');
    }
}
