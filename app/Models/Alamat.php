<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Alamat extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'alamat';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'siswa_id',
        'uuid',
        'jenis_tmpt_tinggal',
        'alamat',
        'desa',
        'kecamatan',
        'jarak',
        'transportasi',
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
