<?php

use Illuminate\Database\Seeder;

class ProductStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_product_statuses')->insert([
            [
                'product_status_name' => '冷蔵',
            ],
            [
                'product_status_name' => '常温',
            ],
            [
                'product_status_name' => '冷凍',
            ],
        ]);
    }
}
