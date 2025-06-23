<?php

namespace App\Services;

use App\Models\Client;
use App\DTOs\ClientDTO;

class ClientService
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Client::all();
    }

    public function create(ClientDTO $dto): Client
    {
        return Client::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'phone' => $dto->phone,
        ]);
    }

    public function update(Client $client, ClientDTO $dto): Client
    {
        $client->update([
            'name' => $dto->name,
            'email' => $dto->email,
            'phone' => $dto->phone,
        ]);

        return $client;
    }

    public function delete(Client $client): void
    {
        $client->delete();
    }
}
