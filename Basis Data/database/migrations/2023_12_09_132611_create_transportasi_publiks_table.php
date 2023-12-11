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
        Schema::create('transportasi_publik', function (Blueprint $table) {
            $table->string('ID_Transport');
            $table->primary('ID_Transport');
            $table->string('Nama_Transport');
            $table->string('Transport_Company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportasi_publik');
    }
};
