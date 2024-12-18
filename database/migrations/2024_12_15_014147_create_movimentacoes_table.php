<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacoesTable extends Migration
{
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->string('coop', 10);
            $table->string('agencia', 10);
            $table->string('conta', 20);
            $table->string('nome', 100);
            $table->string('documento', 20);
            $table->string('codigo', 20);
            $table->string('descricao', 255);
            $table->decimal('debito', 10, 2)->nullable();
            $table->decimal('credito', 10, 2)->nullable();
            $table->dateTime('data_hora');
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimentacoes');
    }
}
