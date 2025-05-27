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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id(); // ID siswa (PK)
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke users
            $table->foreignId('gelombang_id')->nullable()->constrained('gelombang')->onDelete('cascade');
            $table->string('nomor_registrasi')->unique(); // nomor registrasi
            $table->string('nama_siswa'); // nama siswa
            $table->bigInteger('nisn');
            $table->bigInteger('nis');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jmlh_saudara');
            $table->string('anak_ke');
            $table->string('foto')->nullable();

            $table->enum('status_pendaftaran', ['pending', 'verifikasi', 'diterima', 'ditolak'])->default('pending');

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
