<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('order_id')->nullable();
            $table->integer('vendor_item_id')->nullable();
            $table->double('cost');
            $table->integer('quantity')->default(1);
            $table->double('subtotal');
            $table->timestamps();

            $table->foreign('order_id', 'order_items_ibfk_1')->references('id')->on('orders');
            $table->foreign('vendor_item_id', 'order_items_ibfk_2')->references('id')->on('vendor_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
