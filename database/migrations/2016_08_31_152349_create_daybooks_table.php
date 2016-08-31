<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaybooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('daybooks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('particular');
            $table->string('voucher_type');
            $table->integer('voucher_number');
            $table->float('debit_amount');
            $table->string('create_amount');
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
        Schema::drop('daybooks');
    }
}
