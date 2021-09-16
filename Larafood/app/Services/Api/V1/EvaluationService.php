<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\Api\V1\EvaluationRepositoryInterface;


class EvaluationService{

    private $evaluationRepository;

    public function __construct(EvaluationRepositoryInterface $evaluationRepository){
        $this->evaluationRepository = $evaluationRepository;
    }


    public function createNewEvaluation(array $data){
        return $this->evaluationRepository->createNewEvaluation($data);
    }

    public function getEvaluation(int $id){
        return $this->evaluationRepository->getEvaluation($id);
    }

    public function getEvaluationByEmail(string $email){
        return $this->evaluationRepository->getEvaluationByEmail($email);
    }

}