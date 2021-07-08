<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_price');
            $table->integer('purchase_quntity');
            $table->string('purchase_company', 128);
            $table->timestamp('order_date')->useCurrent();
            $table->timestamp('purchase_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_purchases');
    }
}
