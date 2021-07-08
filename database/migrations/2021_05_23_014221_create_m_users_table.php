<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password', 64)->comment('パスワード');
            $table->string('last_name', 16)->comment('性');
            $table->string('first_name', 16)->comment('名');
            $table->string('zipcode', 7)->comment('郵便番号');
            $table->string('prefecture', 16)->comment('都道府県');
            $table->string('municipality', 16)->comment('市町村区');
            $table->string('address', 32)->comment('番地');
            $table->string('apartments', 32)->nullable()->comment('マンション、部屋番号');
            $table->string('email', 128)->unique()->comment('メールアドレス');
            $table->string('phone_number', 14)->comment('電話番号');
            $table->integer('user_classification_id')->unsigned()->default('1')->comment('ユーザ種別プライマリー');
            $table->string('company_name', 128)->nullable()->comment('会社名');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_classification_id')->references('id')->on('m_user_classifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_users');
    }
}
