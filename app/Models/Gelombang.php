<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Gelombang extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'gelombang';

    protected $fillable = [
        'uuid',
        'gelombang',
        'tanggal_mulai',
        'tanggal_selesai',
        'kuota',
        'status',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }


    protected static function booted(): void
    {
        static::creating(function ($gelombang) {
            $gelombang->uuid = (string) Str::uuid();
        });
    }

    // Casting untuk tanggal
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
