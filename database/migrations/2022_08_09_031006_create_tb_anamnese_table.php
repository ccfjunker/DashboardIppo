<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAnamneseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anamnese', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario');
            $table->foreign('id_funcionario')->references('id')->on('tb_funcionario')->onDelete('cascade');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('tb_empresa')->onDelete('cascade');
            $table->dateTime('data_criacao')->nullable();;
            $table->dateTime('data_atualizacao')->nullable();;
            $table->string('proprietario')->nullable();;
            $table->string('cronicos')->nullable();
            $table->string('mental')->nullable();
            $table->string('alimentacao')->nullable();
            $table->string('fisico')->nullable();
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
        Schema::dropIfExists('tb_anamnese');
    }
}
