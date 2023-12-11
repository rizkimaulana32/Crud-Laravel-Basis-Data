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
        Schema::create('rute', function (Blueprint $table) {
            $table->string('ID_Rute');
            $table->primary('ID_Rute');
            $table->string('Nama_Rute');
            $table->dateTime('Waktu_Tiba', 0);
            $table->dateTime('Waktu_Berangkat', 0);
            $table->string('ID_Transport');
            $table->foreign('ID_Transport')->references('ID_Transport')->on('transportasi_publik')->onDelete('cascade')->onUpdate('cascade');
            $table->string('IDLokasi_berangkat_ke');
            $table->foreign('IDLokasi_berangkat_ke')->references('ID_Lokasi')->on('lokasi')->onDelete('cascade')->onUpdate('cascade');
            $table->string('IDLokasi_berangkat_dari');
            $table->foreign('IDLokasi_berangkat_dari')->references('ID_Lokasi')->on('lokasi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rute');
    }
};
