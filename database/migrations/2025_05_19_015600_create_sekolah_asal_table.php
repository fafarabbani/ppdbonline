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
        Schema::create('sekolah_asal', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->string('asal_sekolah');
            $table->enum('Jenjang', ['PAUD', 'Sekolah Dasar', 'Sekolah Menegah Pertama', 'Sekolah Menegah Atas', 'Sekolah Menegah Kejuruan']);
            $table->bigInteger('npsn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah_asal');
    }
};
