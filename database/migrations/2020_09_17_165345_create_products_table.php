<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('discount'); //Desconto do produto
            $table->integer('quantityProduct'); //Quantidade do produto
            $table->string('name', 100); //Nome do produto
            $table->string('url_image', 100); //Imagem do produto
            $table->string('description', 100); //Descricão do produto
            $table->decimal('valueProduct'); //Valor do produto.


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
        Schema::dropIfExists('products');
    }
}
