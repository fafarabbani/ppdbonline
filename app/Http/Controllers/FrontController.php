<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Gelombang;
use App\Models\Siswa;

class FrontController extends Controller
{
/**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function index(User $user) {

        $user = Auth::user();
        $gelombangAktif = Gelombang::where('status', 'Buka')->get();

        // Ambil semua pendaftaran milik user ini
        // $riwayat = Siswa::with('gelombang')
        //         ->where('user_id', $user->id)
        //         ->latest()
        //         ->get();

        // $sudahDaftar = $riwayat->contains(function ($item) {
        //     return in_array($item->status_pendaftaran, ['pending', 'verifikasi']);
        // });
        
        $status = [
            'pending' => 'Pending',
            'verifikasi' => 'Menunggu Verifikasi',
            'diterima' => 'Lulus',
            'ditolak' => 'Gagal',
        ];

        // Cek apakah user sudah mendaftarkan siswa di gelombang ini
        // $siswa = Siswa::where('user_id', $user->id)->latest()->first();
        return view('welcome', compact('user', 'gelombangAktif'));
    }
}
