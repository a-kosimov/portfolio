<?php

namespace App\DTOs;

class ClientDTO
{
    public string $name;
    public string $email;
    public ?string $phone;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->phone = $data['phone'] ?? null;
    }

    public static function fromRequest(array $data): self
    {
        return new self($data);
    }
}

