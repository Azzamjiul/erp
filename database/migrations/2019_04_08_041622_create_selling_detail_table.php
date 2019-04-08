<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellingDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sales_order_no');
            $table->string('sales_order_no_detail');
            $table->string('product_code');
            $table->double('quantity');
            $table->integer('unit_price');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('total');
            $table->integer('company_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('selling_detail');
    }
}
