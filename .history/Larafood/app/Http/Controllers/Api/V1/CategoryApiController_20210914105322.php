<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Resources\Category\CategoryResource;

class CategoryApiController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function getCategoriesByTenant(Request $request){
        $categories = $this->categoryService->getCategoryByTenantUuid($request->uuid)
        return  CategoryResource::collection($categories);
     
    }
}
