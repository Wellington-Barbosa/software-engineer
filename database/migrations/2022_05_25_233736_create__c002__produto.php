<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateC002Produto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('C002_Produto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('C002_CodigoBarras')->unique();
            $table->string('C002_DescricaoProduto');
            $table->string('C002_ValorUnitario');
            $table->string('C002_Quantidade');
            $table->string('C002_UsuarioInclusao')->nullable();
            $table->date('C002_DataInclusao')->nullable();
            $table->string('C002_UsuarioAlteracao')->nullable();
            $table->date('C002_DataAlteracao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('C002_Produto');
    }
}
