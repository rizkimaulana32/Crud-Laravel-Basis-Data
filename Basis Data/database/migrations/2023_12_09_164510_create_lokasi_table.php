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
        Schema::create('lokasi', function (Blueprint $table) {
            $table->string('ID_Lokasi');
            $table->primary('ID_Lokasi');
            $table->string('Jenis_Lokasi');
            $table->string('Nama_Lokasi');
            $table->string('ID_Kota');
            $table->foreign('ID_Kota')->references('ID_Kota')->on('kota')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi');
    }
};
