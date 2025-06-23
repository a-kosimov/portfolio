<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Services\ClientService;
use App\DTOs\ClientDTO;

class ClientController extends Controller
{
    public function __construct(protected ClientService $service) {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreClientRequest $request)
    {
        $dto = ClientDTO::fromRequest($request->validated());
        $client = $this->service->create($dto);
        return response()->json($client, 201);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $dto = ClientDTO::fromRequest($request->validated());
        $client = $this->service->update($client, $dto);
        return response()->json($client);
    }

    public function show(Client $client)
    {
        return response()->json($client);
    }


    public function destroy(Client $client)
    {
        $this->service->delete($client);

        return response()->json(null, 204);
    }
}
