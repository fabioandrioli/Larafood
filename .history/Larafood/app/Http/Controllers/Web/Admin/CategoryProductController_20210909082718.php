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

    public function products($id){

        $product = Product::find($id);
        $categorys = $product->categorys()->paginate();

        return view('admin.pages.products.category.index',compact('product','categorys'));
    }

    public function Categorys($id){

        $category = Category::find($id);
        $products = $category->products()->paginate();

        return view('admin.pages.Categorys.Product.index',compact('Category','products'));
    }

    public function linkNewCategory(Request $request,$id){
        $product = Product::find($id);
    
        if(!$product){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $categorys = $product->CategorysAvailable($request->filter);

        return view('admin.pages.Products.Category.linkNewCategory',compact('product','Categorys','filters'));
    }

    public function linkNewCategoryStore(Request $request, $id){
        $product = Product::find($id);
        if(!$product){
            return redirect()->back();
        }

        if(!$request->Categorys || count($request->Categorys) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos uma permissão");
        }

        $product->Categorys()->attach($request->Categorys);

        return redirect()->route("Products.Categorys", $product->id);
    }

    public function unbindCategory($idProduct, $idCategory){
        $product = Product::find($idProduct);
        $category = Category::find($idCategory);
        if(!$product || !$category){
            return redirect()->back();
        }

        $product->Categorys()->detach($category);
        return redirect()->route("Products.Categorys", $product->id);
    }

}
