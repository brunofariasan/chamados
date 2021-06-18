<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaChamado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     */
    public function up()
    {
        Schema::create('chamado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('titulo');
            $table->text('categoria');
            $table->text('prioridade');
            $table->text('descricao');
            $table->text('imagem');
            $table->text('situacao');
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
        Schema::dropIfExists('chamado');
    }
}
