<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idLivro')->unsigned()->nullable();
            $table->integer('idCliente')->unsigned()->nullable();
            $table->string('status');
            $table->string('dataDeInicio');
            $table->string('dataDeTermino');
            $table->timestamps();
        });

        Schema::table('emprestimos', function (Blueprint $table) {
            $table->foreign('idLivro')->references('id')->on('livros')->onDelete('set null');
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
