<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_asset', function (Blueprint $table) {
            $table->bigIncrements('asset_id');
            $table->string('asset_name');
            $table->unsignedBigInteger('asset_unit_price');
            $table->integer('quantity');
            $table->integer('asset_duration');
            $table->integer('salvage_value');
            $table->double('depreciation_rate');
            $table->double('depreciation_yearly');
            $table->double('depreciation_monthly');
            $table->double('depreciation_daily');
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
        Schema::dropIfExists('fixed_asset');
    }
}
