<?php

use App\Order;
use App\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 購入者種別のみ取得
        $purchasers = User::where('user_classification_id', config('consts.common.USER_CLASSIFICATIONS.purchaser.value'))->get();

        foreach ($purchasers as $purchaser) {
            Order::create(
                [
                    'user_id' => $purchaser->id,
                ]
            );
        }
        for ($i = 0; $i < 30; $i++) {
            Order::create(
                [
                    'user_id' => 1,
                ]
            );
        }
    }
}
