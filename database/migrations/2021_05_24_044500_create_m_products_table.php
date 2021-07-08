<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 64);
            $table->integer('category_id')->unsigned()->index();
            $table->integer('price');
            $table->string('description', 256);
            $table->integer('sale_status_id')->unsigned()->index();
            $table->integer('product_status_id')->unsigned()->index();
            $table->timestamp('regist_date')->useCurrent();
            $table->integer('user_id')->unsigned()->index();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('m_categories');
            $table->foreign('sale_status_id')->references('id')->on('m_sale_statuses');
            $table->foreign('product_status_id')->references('id')->on('m_product_statuses');
            $table->foreign('user_id')->references('id')->on('m_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_products');
    }
}
