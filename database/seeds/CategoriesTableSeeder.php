<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_categories')->insert([
            [
                'category_name' => '肉類',
            ],
            [
                'category_name' => '魚介類',
            ],
            [
                'category_name' => '果物類',
            ],
            [
                'category_name' => '野菜類',
            ],
            [
                'category_name' => '飲み物類',
            ],
            [
                'category_name' => '漬物類',
            ],
            [
                'category_name' => '菓子類',
            ],
        ]);
    }
}
