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
        Schema::create('trip_mempunyai_rute', function (Blueprint $table) {
            $table->integer('ID_Trip');
            $table->foreign('ID_Trip')->references('ID_Trip')->on('trip')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ID_Rute');
            $table->primary(['ID_Trip', 'ID_Rute']);
            $table->foreign('ID_Rute')->references('ID_Rute')->on('rute')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_mempunyai_rute');
    }
};
