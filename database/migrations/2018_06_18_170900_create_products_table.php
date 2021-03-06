<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('sku')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->integer('price')->default(0);
            $table->integer('sale_price')->nullable();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->integer('qty')->default(0);
            $table->integer('qty_per_unit')->default(1);
            $table->integer('minimum_unit')->default(1);
            $table->enum('status', ['inStock', 'outOfStock', 'contact', 'stop'])->default('contact');
            $table->softDeletes();
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
