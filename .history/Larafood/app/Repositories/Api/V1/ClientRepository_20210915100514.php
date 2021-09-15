<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Contracts\Api\V1\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;


class ClientRepository implements ClientRepositoryInterface {

    protected $table;


    public function __construct(){
        $this->table = 'products';
    }


    public function createNewClient(array $data){
        return DB::table($this->table)
                        ->get();
    }

}