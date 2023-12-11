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
        Schema::create('user', function (Blueprint $table) {
            $table->integer('ID_User');
            $table->primary('ID_User');
            $table->string('Nama_User');
            $table->char('Sex', 1);
            $table->string('Email');
            $table->string('ID_Kota');
            $table->foreign('ID_Kota')->references('ID_Kota')->on('kota')->onDelete('cascade')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
