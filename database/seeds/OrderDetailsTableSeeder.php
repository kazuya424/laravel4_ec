<?php

use App\Order;
use App\OrderDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            OrderDetail::create(
                [
                    'product_id' => rand(1, 10),
                    'order_id' => $order->id,
                    'shipment_status_id' => rand(1, 3),
                    'order_detail_number' => Str::random(64),
                    'order_quantity' => rand(1, 10),
                    'shipment_date' => date('Y-m-d H:i:s'),
                ]
            );
        }
    }
}
