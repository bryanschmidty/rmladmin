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
        Schema::create('materials', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->integer('type_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->timestamps();

            $table->foreign('type_id', 'materials_ibfk_1')->references('id')->on('material_types');
            $table->foreign('color_id', 'materials_ibfk_2')->references('id')->on('material_colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
};
