<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\Api\V1\Category\CategoryApiRequest;

class ProductApiController extends Controller
{
   private $productService;

   public function __construct(ProductService $productService){
        $this->productService = productService;
   }

   public function productsByTenant(CategoryApiRequest $request,$uuid){

   }
}
