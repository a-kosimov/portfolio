<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $clients = Client::all();

        Order::factory()->count(1000)->make()->each(function ($order) use ($clients) {
            $order->client_id = $clients->random()->id;
            $order->save();
        });
    }
}
