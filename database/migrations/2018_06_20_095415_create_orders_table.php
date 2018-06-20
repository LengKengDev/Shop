<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum("status", ['new', 'processing', 'approval', 'reject', 'completed'])->default('new');
            $table->string("name");
            $table->string("company")->nullable();
            $table->string("phone");
            $table->string("email");
            $table->string("address")->nullable();
            $table->text("note")->nullable();
            $table->bigInteger("subtotal")->default(0);
            $table->bigInteger("shipping")->default(0);
            $table->bigInteger("tax")->default(0);
            $table->bigInteger("total")->default(0);
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
        Schema::dropIfExists('orders');
    }
}
