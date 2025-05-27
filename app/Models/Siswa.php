<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Siswa extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'siswa';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'uuid',
        'user_id',
        'gelombang_id',
        'nomor_registrasi',
        'nama_siswa',
        'nisn',
        'nis',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'jmlh_saudara',
        'anak_ke',
        'foto',
        'status_pendaftaran',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }


    protected static function booted(): void
    {
        static::creating(function ($siswa) {
            $siswa->uuid = (string) Str::uuid();
        });
    }

    // Relasi dengan model User (Orang Tua)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class);
    }

    public function alamat()
    {
        return $this->hasOne(Alamat::class);
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }

    public function sekolahAsal()
    {
        return $this->hasOne(SekolahAsal::class);
    }
}
