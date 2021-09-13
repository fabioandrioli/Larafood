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

    public function __construct(Product $product, Permission $category){

        $this->$product = $product;
        $this->$category = $category;
    }

    public function products($id){

        $product = Product::find($id);
        $categorys = $product->permissions()->paginate();

        return view('admin.pages.Products.permission.index',compact('Product','permissions'));
    }

    public function permissions($id){

        $category = Permission::find($id);
        $products = $category->Products()->paginate();

        return view('admin.pages.permissions.Product.index',compact('permission','Products'));
    }

    public function linkNewPermission(Request $request,$id){
        $product = Product::find($id);
    
        if(!$product){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $categorys = $product->permissionsAvailable($request->filter);

        return view('admin.pages.Products.permission.linkNewPermission',compact('Product','permissions','filters'));
    }

    public function linkNewPermissionStore(Request $request, $id){
        $product = Product::find($id);
        if(!$product){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos uma permissão");
        }

        $product->permissions()->attach($request->permissions);

        return redirect()->route("Products.permissions", $product->id);
    }

    public function unbindPermission($idProduct, $idPermission){
        $product = Product::find($idProduct);
        $category = Permission::find($idPermission);
        if(!$product || !$category){
            return redirect()->back();
        }

        $product->permissions()->detach($category);
        return redirect()->route("Products.permissions", $product->id);
    }

}
