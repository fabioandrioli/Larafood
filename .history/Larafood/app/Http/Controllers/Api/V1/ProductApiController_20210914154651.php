<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductApiController extends Controller
{
   private $productService;

   public function __construct(ProductService $productService){
        $this->productService = productService;
   }
}
