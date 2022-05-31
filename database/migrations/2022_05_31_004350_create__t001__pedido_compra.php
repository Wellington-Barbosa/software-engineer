<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateT001PedidoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T001_PedidoCompra', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('T001_DataPedido')->nullable();

            //Relacionamento com a tabela C001_Pessoa -- Salvar informações do cliente
            $table->string('C001_CodigoCliente');
            $table->foreign('C001_CodigoCliente')->references('C001_CPF')->on('C001_Pessoa')->cascadeOnDelete();

            $table->string('T001_StatusPedido')->nullable();
            $table->string('T001_UsuarioInclusao')->nullable();
            $table->date('T001_DataInclusao')->nullable();
            $table->string('T001_UsuarioAlteracao')->nullable();
            $table->date('T001_DataAlteracao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T001_PedidoCompra');
    }
}
