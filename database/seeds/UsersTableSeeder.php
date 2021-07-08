<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            User::create(
                [
                    'password' => Hash::make('password'.(string)$i),
                    'last_name' => '鈴木',
                    'first_name' => '和'.(string)$i,
                    'zipcode' => '0001111',
                    'prefecture' => '北海道',
                    'municipality' => '札幌市',
                    'address' => '番地テスト1-'.(string)$i,
                    'apartments' => 'マンションテスト1-'.(string)$i,
                    'email' => 'test1-'.(string)$i.'@example.com',
                    'phone_number' => '0801111222'.(string)$i,
                    'user_classification_id' => config('consts.common.USER_CLASSIFICATIONS.purchaser.value'),
                ]
            );
            User::create(
                [
                    'password' => Hash::make('password'.(string)$i),
                    'last_name' => '山本',
                    'first_name' => '太郎'.(string)$i,
                    'zipcode' => '1112222',
                    'prefecture' => '青森県',
                    'municipality' => '弘前市',
                    'address' => '番地2-'.(string)$i,
                    'apartments' => 'マンション2-'.(string)$i,
                    'email' => 'test2-'.(string)$i.'@example.com',
                    'phone_number' => '0802222333'.(string)$i,
                    'user_classification_id' => config('consts.common.USER_CLASSIFICATIONS.exhibitor.value'),
                    'company_name' => '株式会社山本'.(string)$i,
                ]
            );
            User::create(
                [
                    'password' => Hash::make('password'.(string)$i),
                    'last_name' => '山田',
                    'first_name' => '剛'.(string)$i,
                    'zipcode' => '2223333',
                    'prefecture' => '東京都',
                    'municipality' => '中央区日本橋',
                    'address' => '1丁目'.(string)$i.'番',
                    'apartments' => '日鉄日本橋ビル'.(string)$i,
                    'email' => 'test3-'.(string)$i.'@example.com',
                    'phone_number' => '0803333444'.(string)$i,
                    'user_classification_id' => config('consts.common.USER_CLASSIFICATIONS.admin.value'),
                ]
            );
        }
    }
}
