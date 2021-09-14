<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private $tableService;
    public function __construct(CategoryService $tableService){
        $this->tableService = $tableService;
    }

    public function getCategoriesByTenant(CategoryApiRequest $request){
        $categories = $this->tableService->getCategoryByTenantUuid($request->token_company);
          
        return  CategoryResource::collection($categories);
     
    }

    
    public function show(CategoryApiRequest $request,$url){
        if(!$table = $this->tableService->getCategoryByUrl($url)){
            return response()->json(['message' => 'Category Not found'], 404);
        }
          
        return  new CategoryResource($table);
     
    }
}
