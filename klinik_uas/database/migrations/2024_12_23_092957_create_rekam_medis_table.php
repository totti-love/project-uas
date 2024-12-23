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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('kode', 10);
            $table->date('tanggal');
            $table->uuid('kunjungan_id');
            $table->foreign('kunjungan_id')->references('id')->on('kunjungans');
            $table->uuid('obat_id');
            $table->foreign('obat_id')->references('id')->on('obats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
