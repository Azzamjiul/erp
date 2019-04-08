<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlJournalLTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gl_journal_l', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('journal_h_id');
            $table->string('journal_l_id');
            $table->string('account_number');
            $table->string('line_debit_name');
            $table->string('line_credit_name');
            $table->string('line_debit_amount');
            $table->string('line_credit_amount');
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
        Schema::dropIfExists('gl_journal_l');
    }
}
