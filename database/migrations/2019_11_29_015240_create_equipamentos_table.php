<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('clientes_id');
            $table->string('nome');
            $table->string('usuario');
            $table->string('processador')->nullable();
            $table->string('ram')->nullable();
            $table->string('hd')->nullable();
            $table->string('ethernet')->nullable();
            $table->string('ip')->nullable();
            $table->string('ipfixo')->nullable();
            $table->text('programas')->nullable();
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
        Schema::dropIfExists('equipamentos');
    }
}
