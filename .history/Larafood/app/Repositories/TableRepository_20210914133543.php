<?php

namespace App\Repositories;

use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\Facades\DB;


class TableRepository implements TableRepositoryInterface {

    protected $table;


    public function __construct(){
        $this->table = 'tables';
    }


    public function getTableByTenantUuid(string $uuid){
        return DB::table($this->table)
                        ->join('tenants','tenants.id','=','tables.id')
                        ->where('tenants.uuid',$uuid)
                        ->select('tables.*')
                        ->paginate();
    }

    public function getTableByTenantId(int $idTenant){
        return DB::table($this->table)
                        ->where('tenant_id',$idTenant)
                        ->get();
    }


    public function getTableByFlag(string $flag){
        return DB::table($this->table)
        ->where('url',$url)
        ->first();
    }

   
}