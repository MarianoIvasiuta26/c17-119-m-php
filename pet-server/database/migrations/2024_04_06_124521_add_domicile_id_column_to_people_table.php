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
        Schema::table('people', function (Blueprint $table) {
            $table->unsignedBigInteger('domicile_id')->after('user_id');
            
            $table->foreign('domicile_id')
            ->references('id')
            ->on('domiciles')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropForeign(['domicile_id']);
            $table->dropColumn('domicile_id');

            $table->dropSoftDeletes();
        });
    }
};
