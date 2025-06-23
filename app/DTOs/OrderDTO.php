<?php

namespace App\DTOs;

class OrderDTO
{
    public function __construct(
        public int $clientId,
        public string $number,
        public string $status,
        public float $amount
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            clientId: $request->input('client_id'),
            number: $request->input('number'),
            status: $request->input('status'),
            amount: $request->input('amount')
        );
    }
}

