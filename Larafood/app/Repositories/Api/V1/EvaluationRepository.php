<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Contracts\Api\V1\EvaluationRepositoryInterface;
use App\Models\Evaluation;


class EvaluationRepository implements EvaluationRepositoryInterface {

    private $evaluation;


    public function __construct(Evaluation $evaluation){
        $this->evaluation = $evaluation;
    }


    public function createNewEvaluation(array $data){
        return $this->evaluation->create($data);
    }

    public function getEvaluation(int $id){
        return $this->evaluation->find($id);
    }

    public function getEvaluationByEmail(string $email){
        return $this->evaluation->where("email",$email)->first();
    }

}