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
        Schema::create('refuges', function (Blueprint $table) {
            $table->id();
            $table->string('name_refuge', 80)->default('Sin nombre');
            $table->string('phone',15)->default('Sin teléfono');
            $table->unsignedBigInteger('domicile_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('domicile_id')
                ->references('id')
                ->on('domiciles')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->softDeletes(); //Permite un borrado lógico sin perder los registros de la BD.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refuges');
    }
};
