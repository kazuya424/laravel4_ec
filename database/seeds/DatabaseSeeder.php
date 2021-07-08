<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserClassificationTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SaleStatusesTableSeeder::class);
        $this->call(ProductStatusesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ShipmentStatusesTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(ApplicantsTableSeeder::class);
    }
}
