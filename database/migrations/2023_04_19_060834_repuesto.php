<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Repuesto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repuesto', function (Blueprint $table) {
            $table->bigIncrements('id_repuesto')->unique;
            $table->string('rnombre');
            $table->integer('rcantidad');
            $table->decimal('rprecio',10,2);
            $table->integer('stock_min');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
