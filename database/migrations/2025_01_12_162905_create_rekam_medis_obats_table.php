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
    Schema::create('rekam_medis_obats', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->uuid('rekam_medis_id'); // Foreign key ke rekam medis
        $table->uuid('obat_id');        // Foreign key ke obats
        $table->timestamps();

        // Foreign key constraints
        $table->foreign('rekam_medis_id')->references('id')->on('rekam_medis')->onDelete('cascade');
        $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::dropIfExists('rekam_medis_obats');
}

};
