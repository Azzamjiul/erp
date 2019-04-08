<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_item', function (Blueprint $table) {
            $table->bigIncrements('inventory_item_id');
            $table->unsignedBigInteger('product_group_number');
            $table->integer('product_item_barcode');
            $table->integer('product_code');
            $table->string('inventory_item_name', 200);
            $table->integer('inventory_item_stock');
            $table->text('inventory_item_description');
            $table->text('inventory_item_photo');
            $table->integer('inventory_item_purchase_price');
            $table->integer('inventory_item_sale_price');
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
        Schema::dropIfExists('inventory_item');
    }
}
