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
        Schema::create('gelombang', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->integer('gelombang');  // Kolom untuk menyimpan nomor gelombang
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('kuota');
            $table->enum('status', ['Buka', 'Tutup'])->default('Buka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gelombang');
    }
};
