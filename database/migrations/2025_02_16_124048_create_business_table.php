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

        Schema::create('business', function (Blueprint $table) {
            $table->id()->foreign('home_advertising.fk_business');
            $table->bigInteger('fk_category');
            $table->string('name');
            $table->bigInteger('phone_01');
            $table->bigInteger('phone_02');
            $table->bigInteger('phone_03');
            $table->string('place');
            $table->bigInteger('zipe_code');
            $table->bigInteger('fk_city');
            $table->foreign('fk_city')->references('id')->on('cities');
            $table->bigInteger('fk_contact');
            $table->foreign('fk_contact')->references('id')->on('business_contact');
            $table->text('tags');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business');
    }
};
