<?php

use App\ShipmentStatus;
use Illuminate\Database\Seeder;

class ShipmentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('consts.common.SHIPMENT_STATUSES') as $shipmentStatus) {
            ShipmentStatus::create([
                'shipment_status_name' => $shipmentStatus['value'],
            ]);
        }
    }
}
