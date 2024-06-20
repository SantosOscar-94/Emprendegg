<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ban');
            $table->string('moneda');
            $table->string('num_cuenta');
            $table->string('cci');

            $table->string('nombre_ban1');
            $table->string('moneda1');
            $table->string('num_cuenta1');
            $table->string('cci1');

            $table->string('nombre_ban2');
            $table->string('moneda2');
            $table->string('num_cuenta2');
            $table->string('cci2');

            $table->string('nombre_ban3');
            $table->string('moneda3');
            $table->string('num_cuenta3');
            $table->string('cci3');
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
        Schema::dropIfExists('cuentas');
    }
}
