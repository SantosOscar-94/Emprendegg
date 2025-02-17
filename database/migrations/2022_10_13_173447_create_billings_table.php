<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->integer('idtipo_comprobante');
            $table->string('serie');
            $table->string('correlativo');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento');
            $table->time('hora');
            $table->integer('idcliente');
            $table->integer('idmoneda');
            $table->integer('idpago');
            $table->integer('modo_pago');
            $table->string('referencia_transaccion')->nullable();
            $table->decimal('exonerada', 18, 2);
            $table->decimal('inafecta', 18, 2);
            $table->decimal('gravada', 18, 2);
            $table->decimal('anticipo', 18, 2);
            $table->decimal('igv', 18, 2);
            $table->decimal('gratuita', 18, 2);
            $table->decimal('otros_cargos', 18, 2);
            $table->decimal('total', 18, 2);
            $table->string('observaciones')->nullable();
            $table->integer('cdr')->nullable();
            $table->integer('anulado')->nullable();
            $table->integer('id_tipo_nota_credito')->nullable();
            $table->integer('idfactura_anular')->nullable();
            $table->string('motivo')->nullable();
            $table->integer('estado_cpe')->nullable();
            $table->binary('errores')->nullable();
            $table->string('nticket')->nullable();
            $table->integer('idusuario');
            $table->integer('idcaja');
            $table->decimal('vuelto', 18, 2)->nullable();
            $table->string('qr')->nullable();
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
        Schema::dropIfExists('billings');
    }
}
