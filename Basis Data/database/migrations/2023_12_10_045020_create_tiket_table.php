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
        Schema::create('tiket', function (Blueprint $table) {
            $table->string('ID_Tiket');
            $table->primary('ID_Tiket');
            $table->decimal('Harga', 10, 2);
            $table->dateTime('Jadwal_Berangkat', 0);
            $table->date('Tgl_Beli');
            $table->string('ID_Transport');
            $table->foreign('ID_Transport')->references('ID_Transport')->on('transportasi_publik')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ID_Trip');
            $table->foreign('ID_Trip')->references('ID_Trip')->on('trip')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ID_User');
            $table->foreign('ID_User')->references('ID_User')->on('user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
