<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Services\OrderService;
use App\DTOs\OrderDTO;
use App\Models\Order;
use Illuminate\Http\Response;
class OrderController extends Controller
{
    public function __construct(protected OrderService $service) {}

    public function index()
    {
        return Order::with('client')->paginate(15);
    }

    public function store(StoreOrderRequest $request)
    {
        $dto = OrderDTO::fromRequest($request);
        return $this->service->create($dto);
    }

    public function show(Order $order)
    {
        return $order->load('client');
    }
    public function update(StoreOrderRequest $request, Order $order)
    {
        $dto = OrderDTO::fromRequest($request);
        return $this->service->update($order, $dto);
    }

    public function destroy(Order $order)
    {
        $this->service->delete($order);
        return response()->json(['message' => 'Order deleted'], Response::HTTP_NO_CONTENT);
    }
}
