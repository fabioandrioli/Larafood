<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Requests\Api\V1\Category\CategoryApiRequest;

class CategoryApiController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function getCategoriesByTenant(CategoryApiRequest $request){
        $categories = $this->categoryService->getCategoryByTenantUuid($request->token_company)
          
        return  CategoryResource::collection($categories);
     
    }
}
