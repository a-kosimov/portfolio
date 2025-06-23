<?php

namespace App\Services;

use App\Models\Order;
use App\DTOs\OrderDTO;

class OrderService
{
    public function create(OrderDTO $dto): Order
    {
        return Order::create([
            'client_id' => $dto->clientId,
            'number' => $dto->number,
            'status' => $dto->status,
            'amount' => $dto->amount,
        ]);
    }

    public function update(Order $order, OrderDTO $dto): Order
    {
        $order->update([
            'client_id' => $dto->clientId,
            'number' => $dto->number,
            'status' => $dto->status,
            'amount' => $dto->amount,
        ]);

        return $order;
    }

    public function delete(Order $order): void
    {
        $order->delete();
    }
}
