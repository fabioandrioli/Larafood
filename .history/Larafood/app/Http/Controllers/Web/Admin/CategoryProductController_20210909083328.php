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


    public function categories($id){

        $category = Category::find($id);
        $products = $category->products()->paginate();

        return view('admin.pages.categories.product.index',compact('category','products'));
    }

    public function linkNewProduct(Request $request,$id){
        $product = Product::find($id);
    
        if(!$product){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $categories = $product->CategorysAvailable($request->filter);

        return view('admin.pages.products.category.linkNewCategory',compact('product','categories','filters'));
    }

    public function linkNewCategoryStore(Request $request, $id){
        $product = Product::find($id);
        if(!$product){
            return redirect()->back();
        }

        if(!$request->categories || count($request->Categories) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos um produto");
        }

        $product->categories()->attach($request->categorys);

        return redirect()->route("products.categories", $product->id);
    }

    public function unbindCategory($idProduct, $idCategory){
        $product = Product::find($idProduct);
        $category = Category::find($idCategory);
        if(!$product || !$category){
            return redirect()->back();
        }

        $product->categories()->detach($category);
        return redirect()->route("products.categories", $product->id);
    }

}
