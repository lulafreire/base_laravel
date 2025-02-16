<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('category_advertising', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_business');
            $table->foreign('fk_business')->references('id')->on('business');
            $table->date('date_ini');
            $table->date('date_end');
            $table->string('image');
            $table->bigInteger('category');
            $table->foreign('category')->references('id')->on('categories');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_advertising');
    }
};
