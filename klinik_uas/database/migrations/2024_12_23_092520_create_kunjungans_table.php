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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('kode');
            $table->date('tanggal');
            $table->string('keluhan');
            $table->uuid('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens');
            $table->uuid('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
