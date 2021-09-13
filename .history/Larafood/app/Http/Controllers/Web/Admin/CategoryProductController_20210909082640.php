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
        $categorys = $product->Capublic function __construct(Product $product, Categorys()->paginate();

        return view('admin.pages.Products.Capublic function __construct(Product $product, Category.index',compact('product','Capublic function __construct(Product $product, Categorys'));
    }

    public function Capublic function __construct(Product $product, Categorys($id){

        $category = Capublic function __construct(Product $product, Category::find($id);
        $products = $category->products()->paginate();

        return view('admin.pages.Capublic function __construct(Product $product, Categorys.Product.index',compact('Capublic function __construct(Product $product, Category','products'));
    }

    public function linkNewCapublic function __construct(Product $product, Category(Request $request,$id){
        $product = Product::find($id);
    
        if(!$product){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $categorys = $product->Capublic function __construct(Product $product, CategorysAvailable($request->filter);

        return view('admin.pages.Products.Capublic function __construct(Product $product, Category.linkNewCapublic function __construct(Product $product, Category',compact('product','Capublic function __construct(Product $product, Categorys','filters'));
    }

    public function linkNewCapublic function __construct(Product $product, CategoryStore(Request $request, $id){
        $product = Product::find($id);
        if(!$product){
            return redirect()->back();
        }

        if(!$request->Capublic function __construct(Product $product, Categorys || count($request->Capublic function __construct(Product $product, Categorys) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos uma permissão");
        }

        $product->Capublic function __construct(Product $product, Categorys()->attach($request->Capublic function __construct(Product $product, Categorys);

        return redirect()->route("Products.Capublic function __construct(Product $product, Categorys", $product->id);
    }

    public function unbindCapublic function __construct(Product $product, Category($idProduct, $idCapublic function __construct(Product $product, Category){
        $product = Product::find($idProduct);
        $category = Capublic function __construct(Product $product, Category::find($idCapublic function __construct(Product $product, Category);
        if(!$product || !$category){
            return redirect()->back();
        }

        $product->Capublic function __construct(Product $product, Categorys()->detach($category);
        return redirect()->route("Products.Capublic function __construct(Product $product, Categorys", $product->id);
    }

}
