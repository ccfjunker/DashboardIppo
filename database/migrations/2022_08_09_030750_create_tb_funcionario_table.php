<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_funcionario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('tb_empresa')->onDelete('cascade');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('nome_social')->nullable();
            $table->string('telefone', 11)->unique();
            $table->string('cpf', 11)->unique();
            $table->string('email')->unique();
            $table->date('data_nascimento');
            $table->char('engajou')->default('N');
            $table->char('genero');
            $table->char('trabalho', 2);
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
        Schema::dropIfExists('tb_funcionario');
    }
}
