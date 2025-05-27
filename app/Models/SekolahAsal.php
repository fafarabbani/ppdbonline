<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class SekolahAsal extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'sekolah_asal';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'siswa_id',
        'uuid',
        'asal_sekolah',
        'jenjang',
        'npsn',
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
