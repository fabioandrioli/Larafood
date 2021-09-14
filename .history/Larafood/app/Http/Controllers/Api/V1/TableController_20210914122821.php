<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private $tableService;
    public function __construct(TableService $tableService){
        $this->tableService = $tableService;
    }

    public function getCategoriesByTenant(TableApiRequest $request){
        $categories = $this->tableService->getTableByTenantUuid($request->token_company);
          
        return  TableResource::collection($categories);
     
    }

    
    public function show(TableApiRequest $request,$url){
        if(!$table = $this->tableService->getTableByUrl($url)){
            return response()->json(['message' => 'Table Not found'], 404);
        }
          
        return  new TableResource($table);
     
    }
}
