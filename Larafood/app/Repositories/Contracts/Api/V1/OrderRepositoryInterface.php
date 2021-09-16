<?php

namespace App\Repositories\Contracts\Api\V1;

interface OrderRepositoryInterface {

    public function createNewOrder(array $data);
    public function getOrder(int $id);
    public function getOrderByEmail(string $email);
}