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
        Schema::create('vendor_item_details', function (Blueprint $table) {
            $table->integer('vendor_item_id')->nullable();
            $table->integer('material_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('size')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();

            $table->foreign('vendor_item_id', 'vendor_item_details_ibfk_1')->references('id')->on('vendor_items');
            $table->foreign('material_id', 'vendor_item_details_ibfk_2')->references('id')->on('materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_item_details');
    }
};
