<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Table\TableResource;
use App\Http\Requests\Api\V1\Table\TableApiRequest;

class TableApiController extends Controller
{
    private $tableService;
    public function __construct(TableService $tableService){
        $this->tableService = $tableService;
    }

    public function getTablesByTenant(TableApiRequest $request){
        $tables = $this->tableService->getTableByTenantUuid($request->token_company);
          
        return  TableResource::collection($tables);
     
    }

    
    public function show(TableApiRequest $request,$url){
        if(!$table = $this->tableService->getTableByUrl($url)){
            return response()->json(['message' => 'Table Not found'], 404);
        }
          
        return  new TableResource($table);
     
    }
}
