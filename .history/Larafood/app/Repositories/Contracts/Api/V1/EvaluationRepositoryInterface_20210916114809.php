<?php

namespace App\Repositories\Contracts\Api\V1;

interface EvaluationRepositoryInterface {

    public function createNewEvaluation(array $data);
    public function getEvaluation(int $id);
    public function getEvaluationByEmail(string $email);
}