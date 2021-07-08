<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use Illuminate\Support\Str;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Applicant::create([
                'auth_code' => Str::random(15).$i,
                'email' => 'applicant'.(string)$i.'@example.com',
            ]);
        }
    }
}
