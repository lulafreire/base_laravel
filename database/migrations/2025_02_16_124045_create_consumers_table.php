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

        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('place');
            $table->bigInteger('zip_code');
            $table->bigInteger('fk_city');
            $table->foreign('fk_city')->references('id')->on('cities');
            $table->string('image');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumers');
    }
};
