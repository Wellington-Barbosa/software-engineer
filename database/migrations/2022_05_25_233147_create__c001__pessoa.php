<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateC001Pessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('C001_Pessoa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('C001_CPF')->unique();
            $table->string('C001_NomePessoa');
            $table->string('C001_Email');
            $table->string('C001_UsuarioInclusao')->nullable();
            $table->date('C001_DataInclusao')->nullable();
            $table->string('C001_UsuarioAlteracao')->nullable();
            $table->date('C001_DataAlteracao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('C001_Pessoa');
    }
}
