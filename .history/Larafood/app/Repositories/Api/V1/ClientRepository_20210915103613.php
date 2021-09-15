<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Contracts\Api\V1\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Client;


class ClientRepository implements ClientRepositoryInterface {

    protected $table;


    public function __construct(){
        $this->table = 'clients';
    }


    public function createNewClient(array $data){
        return DB::table($this->table)
                        ->get();
    }

    public function getClient(int $id){
        
    }

}