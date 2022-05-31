<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateT002PedidoCompraItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T002_PedidoCompraItem', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Relacionamento com a tabela de Pedidos - T001_PedidoCompra
            $table->foreignId('T001_ID');
            $table->foreign('T001_ID')->references('id')->on('T001_PedidoCompra')->cascadeOnDelete();

            //Relacionamento com a tabela de Produtos - C002_Produto
            $table->string('C002_CodigoProduto');
            $table->foreign('C002_CodigoProduto')->references('C002_CodigoBarras')->on('C002_Produto')->cascadeOnDelete();
            $table->string('C002_DescricaoProduto');

            $table->string('T002_Quantidade')->nullable();
            $table->string('T002_ValorItem')->nullable();
            $table->string('T002_ValorTotalItem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T002_PedidoCompraItem');
    }
}
