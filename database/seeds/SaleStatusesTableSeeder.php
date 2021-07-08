<?php

use Illuminate\Database\Seeder;

class SaleStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sale_statuses')->insert([
            [
                'sale_status_name' => '販売中',
            ],
            [
                'sale_status_name' => '販売終了',
            ],
            [
                'sale_status_name' => '入荷待ち',
            ],
        ]);
    }
}
