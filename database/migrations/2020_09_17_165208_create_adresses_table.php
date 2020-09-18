<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('city', 25); //Cidade
            $table->string('uf', 2); //UF
            $table->string('street', 10); //Rua
            $table->string('neighborhood', 100); //Bairro
            $table->string('cep',9); //CEP da cidade
            $table->integer('numberHome'); //Numero da casa
            $table->foreignId('user_id'); //Chave estrangeira de Users
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
}
