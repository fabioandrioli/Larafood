<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\product\RequestStoreUpdateProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

        $data = $request->all();
        $user = Auth::user();
        $tenant = $user->tenant;
        if($request->hasFile('image') && $request->image->isValid()){
            $data["image"] = $request->image->storeAs("tenants/{$tenant->uuid}/products");
        }
        $data["image"] = $request->image->storeAs("tenants/{$tenant->uuid}/products");
        // dd($data);

        $this->repository->create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = $this->repository->find($id);

        if(!$product)
            return redirect()->back();

        return view('admin.pages.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);

        if(!$product)
            return redirect()->back();

        return view('admin.pages.products.create_edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUpdateproduct $request,$id)
    {
        $product = $this->repository->find($id);

        if(!$product)
            return redirect()->back();

        $data = $request->all();
        $user = Auth::user();
        $tenant = $user->tenant;
        if($request->hasFile('image') && $request->image->isValid()){

            if (Storage::exists($product->image)) {
                Storage::delete($product->image);
            }

            $data["image"] = $request->image->store("tenants/{$tenant->uuid}/products");
        }
        $product->update($data);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$product = $this->repository->find($id)) {
            return redirect()->back();
        }

        if (Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index');
    }
}
