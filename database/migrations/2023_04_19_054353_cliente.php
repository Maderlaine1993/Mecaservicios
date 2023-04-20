<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$table->timestamp('email_verified_at')->nullable();
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('nit')->unique;
            $table->string('cnombre')->nullable(false);
            $table->string('capellido')->nullable(false);
            $table->string('ctelefono')->nullable(false);
            $table->string('cemail')->unique;
            $table->string('cdireccion')->nullable(false);
            $table->integer('num_servicio')->nullable(false);
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
