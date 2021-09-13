<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryProductController extends Controller
{
    private $product;
    private $category;

    public function __construct(Product $product, Category $category){

        $this->$product = $product;
        $this->$category = $category;
    }


    public function categories($url){

        $category = Category::where($url,'url')->first();
        $products = $category->products()->paginate();

        return view('admin.pages.categories.product.index',compact('category','products'));
    }

    public function linkNewProduct(Request $request,$url){
        $category = Category::where($url,'url')->first();
    
        if(!$category){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $products = $category->ProductsAvailable($request->filter);

        return view('admin.pages.categories.product.linkNewProduct',compact('products','category','filters'));
    }

    public function linkNewProductStore(Request $request, $url){
        $category = Category::where($url,'url')->first();
        if(!$category){
            return redirect()->back();
        }

        if(!$request->products || count($request->products) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos um produto");
        }

        $category->products()->attach($request->categorys);

        return redirect()->route("categories.products", $category->id);
    }

    public function unbindProduct($url,$idProduct){
        $product = Product::find($idProduct);
        $category = Category::where($url,'url')->first();
        if(!$product || !$category){
            return redirect()->back();
        }

        $category->products()->detach($product);
        return redirect()->route("categories.products", $category->id);
    }

}
