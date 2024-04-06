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
        Schema::create('domiciles', function (Blueprint $table) {
            $table->id();
            $table->double('latitude')->default(0);
            $table->double('longitude')->defualt(0);
            $table->string('country')->default('');
            $table->string('province')->default('');
            $table->string('city')->default('');
            $table->string('postal_code')->default('');
            $table->string('address')->default('');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domiciles');
    }
};
