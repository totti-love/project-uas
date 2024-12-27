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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('nama', 30);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 1);
            $table->string('alamat', 50);
            $table->string('no_telp', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
