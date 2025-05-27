<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->enum('jenis_tmpt_tinggal', ['Bersama Orang Tua', 'Bersama Wali', 'Kost', 'Asrama', 'Panti Asuhan', 'Lainnya']);
            $table->string('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->enum('jarak', ['< 1KM', '1KM-5KM', '> 5KM']);
            $table->enum('transportasi', ['Jalan kaki', 'Kendaraan Pribadi', 'Kendaraan Umum/Angkot', 'Jemputan Sekolah', 'Ojek', 'Sepeda', 'Lainnya']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
