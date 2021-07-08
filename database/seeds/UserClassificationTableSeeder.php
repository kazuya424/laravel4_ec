<?php

use App\UserClassification;
use Illuminate\Database\Seeder;

class UserClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('consts.common.USER_CLASSIFICATIONS') as $userClassification) {
            UserClassification::create([
                'user_classification_name' => $userClassification['label']
            ]);
        }
    }
}
