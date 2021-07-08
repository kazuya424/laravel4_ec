<?php

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_purchases')->insert([
            [
                'purchase_price' => 6000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '広島ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 1,
            ],
            [
                'purchase_price' => 3000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '長崎ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 2,
            ],
            [
                'purchase_price' => 3500,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '大阪ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 3,
            ],
            [
                'purchase_price' => 2500,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '北海道ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 4,
            ],
            [
                'purchase_price' => 7000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '岩手ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 5,
            ],
            [
                'purchase_price' => 2000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '宮城ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 6,
            ],
            [
                'purchase_price' => 5000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '奈良ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 7,
            ],
            [
                'purchase_price' => 120000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '広島ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 8,
            ],
            [
                'purchase_price' => 30000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '長崎ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 9,
            ],
            [
                'purchase_price' => 7500,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '大阪ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 10,
            ],
            [
                'purchase_price' => 2500,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '北海道ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 11,
            ],
            [
                'purchase_price' => 2000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '岩手ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 12,
            ],
            [
                'purchase_price' => 4000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '宮城ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 13,
            ],
            [
                'purchase_price' => 2000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '奈良ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 14,
            ],
            [
                'purchase_price' => 20000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '広島ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 15,
            ],
            [
                'purchase_price' => 30000,
                'purchase_quntity' => rand(1, 10),
                'purchase_company' => '長崎ー株式会社ー会社名',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => 16,
            ],
        ]);
    }
}
