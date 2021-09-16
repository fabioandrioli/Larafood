<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Contracts\Api\V1\EvaluationRepositoryInterface;
use App\Models\Evaluation;


class EvaluationRepository implements EvaluationRepositoryInterface {

    private $client;


    public function __construct(Evaluation $client){
        $this->client = $client;
    }


    public function createNewEvaluation(array $data){
        return $this->client->create($data);
    }

    public function getEvaluation(int $id){
        return $this->client->find($id);
    }

    public function getEvaluationByEmail(string $email){
        return $this->client->where("email",$email)->first();
    }

}