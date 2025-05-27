<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Gelombang;
use App\Models\OrangTua;
use App\Models\SekolahAsal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormPendaftaranController extends Controller
{
    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function create (Gelombang $gelombang)
    {
        $user = Auth::user();

        $tahun = now()->year;
        $jumlahGelombangTahunIni = Gelombang::whereYear('created_at', $tahun)->count();
        $angkaRandom = random_int(10, 99);
        $jumlahSiswaDalamGelombang = Siswa::where('gelombang_id', $gelombang->id)->count();

        $nomor_registrasi = sprintf(
            'REG-%d%d%03d%02d%03d',
            $tahun,
            $jumlahGelombangTahunIni,
            (int) $gelombang->created_at->format('y'),
            $angkaRandom,
            $jumlahSiswaDalamGelombang + 1
        );

        return view('user.formulir.data-siswa', [
            'gelombang' => $gelombang,
            'user' => $user,
            'nomor_registrasi' => $nomor_registrasi
        ]);
    }

    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function store (Request $request, Gelombang $gelombang)
    {
        $request->validate([
            'gelombang_id' => 'required|exists:gelombang,id',
            'nomor_registrasi' => 'required|unique:siswa,nomor_registrasi',
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|numeric|digits_between:9,10',
            'nis' => 'required|numeric|digits_between:8,15',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jmlh_saudara' => 'required|integer',
            'anak_ke' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $siswa = Siswa::create([
            'user_id' => Auth::id(),
            'gelombang_id' => $request->gelombang_id,
            'nomor_registrasi' => $request->nomor_registrasi,
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jmlh_saudara' => $request->jmlh_saudara,
            'anak_ke' => $request->anak_ke,
            'foto' => $request->foto ?? null,
            'status_pendaftaran' => 'pending',
        ]);

        return redirect()->route('user.dashboard', Auth::user()->uuid)->with('success', 'Pendaftaran berhasil disimpan!');
    }

















}
