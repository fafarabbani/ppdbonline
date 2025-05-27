<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Gelombang;
use App\Models\Siswa;
use App\Models\User;

class AdminMainController extends Controller
{
    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function index() {

        $jumlahGelombang = Gelombang::count();
        $jumlahSiswa = Siswa::count();
        $jumlahDiterima = Siswa::where('status_pendaftaran', 'diterima')->count();
        $jumlahDitolak = Siswa::where('status_pendaftaran', 'ditolak')->count();

        $jumlahUser = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('jumlahGelombang', 'jumlahSiswa', 'jumlahDiterima', 'jumlahDitolak', 'jumlahUser'));
    }
}
