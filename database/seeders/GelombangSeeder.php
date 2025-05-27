<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Gelombang;
use Illuminate\Support\Str;

class GelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        $gelombang1 = Gelombang::create([
            'uuid'              => Str::uuid(),
            'gelombang'         => '1',
            'tanggal_mulai'     => '2023-01-17',
            'tanggal_selesai'   => '2023-02-25',
            'kuota'             => '50',
            'status'            => 'Buka',
        ]);

        $gelombang2 = Gelombang::create([
            'uuid'              => Str::uuid(),
            'gelombang'         => '2',
            'tanggal_mulai'     => '2023-03-14',
            'tanggal_selesai'   => '2023-04-11',
            'kuota'             => '50',
            'status'            => 'Buka',
        ]);

        $gelombang3 = Gelombang::create([
            'uuid'              => Str::uuid(),
            'gelombang'         => '1',
            'tanggal_mulai'     => '2024-01-09',
            'tanggal_selesai'   => '2022-02-24',
            'kuota'             => '100',
            'status'            => 'Buka',
        ]);
    }
}
