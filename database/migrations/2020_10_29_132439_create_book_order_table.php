<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // intermediate table between books and orders
        Schema::create('book_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('quantity')->default(1); // unsigned = not zero, default 1 seems logical
            // $table->timestamps(); // we don't generally need these

            $table->unique(['book_id', 'order_id']); // so that one kind of book cannot
            // be added to the same order twice
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_order');
    }
}
