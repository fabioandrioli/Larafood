<?php

namespace App\Services\Api\V1;

use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\Api\V1\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Http\Request;


class OrderService{

    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository){
        $this->orderRepository = $orderRepository;
    }


    public function createNewOrder(array $data){
        return $this->orderRepository->createNewOrder($data);
    }

    public function getOrder(int $id){
        return $this->orderRepository->getOrder($id);
    }

    public function getOrderByEmail(string $email){
        return $this->orderRepository->getOrderByEmail($email);
    }

}