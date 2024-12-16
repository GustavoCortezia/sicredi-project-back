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
            $table->string('coop', 10)->nullable();
            $table->string('agencia', 10)->nullable();
            $table->string('conta', 20)->nullable();
            $table->string('nome', 100)->nullable();
            $table->string('documento', 20)->nullable();
            $table->string('codigo', 20)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->decimal('debito', 10, 2)->nullable();
            $table->decimal('credito', 10, 2)->nullable();
            $table->dateTime('data_hora')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movimentacoes');
    }
}
