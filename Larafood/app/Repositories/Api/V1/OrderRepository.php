<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Contracts\Api\V1\OrderRepositoryInterface;
use App\Models\Order;


class OrderRepository implements OrderRepositoryInterface {

    private $order;


    public function __construct(Order $order){
        $this->order = $order;
    }


    public function createNewOrder(array $data){
        return $this->order->create($data);
    }

    public function getOrder(int $id){
        return $this->order->find($id);
    }

    public function getOrderByEmail(string $email){
        return $this->order->where("email",$email)->first();
    }

}