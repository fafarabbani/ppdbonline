<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class OrangTua extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'orangtua_siswa';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'siswa_id',
        'uuid',
        'no_kk',
        'kepala_keluarga',
        'nama_ayah',
        'nik_ayah',
        'thn_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'nik_ibu',
        'thn_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }


    protected static function booted(): void
    {
        static::creating(function ($alamat) {
            $alamat->uuid = (string) Str::uuid();
        });
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}
