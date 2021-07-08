<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAppliCants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 128)->unique()->comment('メールアドレス');
            $table->string('auth_code', 16)->unique()->comment('認証コード');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_applicants');
    }
}
