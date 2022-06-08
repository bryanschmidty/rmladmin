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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('vendor_account_id')->nullable();
            $table->string('order_id')->nullable();
            $table->dateTime('ordered_at')->nullable();
            $table->string('url')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('shipping')->nullable();
            $table->double('discount')->nullable();
            $table->double('total_before_tax')->nullable();
            $table->double('tax')->nullable();
            $table->double('gift_card')->nullable();
            $table->double('total');
            $table->timestamps();

            $table->foreign('vendor_account_id', 'orders_ibfk_1')->references('id')->on('vendor_accounts');
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
};
