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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('pet_state_id')->nullable();
            $table->integer('animal_id')->nullable();
            $table->string('name', 50)->nullable();
            $table->integer('age')->nullable();
            $table->string('color', 30)->nullable();
            $table->string('race', 50)->nullable();
            $table->string('size', 20)->nullable();
            $table->string('description', 200)->nullable();
            $table->string('image', 100)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pet_state_id')->references('id')->on('pet_states');
            $table->foreign('animal_id')->references('id')->on('animals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};