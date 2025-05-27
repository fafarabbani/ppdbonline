<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gelombang;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Siswa;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use PDF;

class RiwayatPendaftaranController extends Controller
{
    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function index() {
        $user = Auth::user();


        // Ambil semua pendaftaran milik user ini
        $riwayat = Siswa::with('gelombang')
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        
        $status = [
            'pending' => 'Pending',
            'verifikasi' => 'Menunggu Verifikasi',
            'diterima' => 'Lulus',
            'ditolak' => 'Gagal',
        ];

        return view('user.riwayat-pendaftaran.index', compact('riwayat', 'status'));
    }

    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function show(Siswa $siswa) 
    {
            // Optional: tambahkan pembatasan agar hanya user yang punya siswa ini yang bisa melihat
        if ($siswa->user_id !== Auth::id()) {
            abort(403);
        }

        // Eager load semua relasi
        $siswa->load(['user', 'gelombang', 'alamat', 'orangTua', 'sekolahAsal']);

        return view('user.riwayat-pendaftaran.show', ['data' => $siswa]);
    }

    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function edit(Siswa $siswa) 
    {
        if ($siswa->user_id !== Auth::id()) {
            abort(403);
        }

        $siswa->load(['user', 'gelombang', 'alamat', 'orangTua', 'sekolahAsal']);

        return view('user.riwayat-pendaftaran.edit', ['data' => $siswa]);
    }

    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function update(Request $request, Siswa $siswa) 
    {
        if ($siswa->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|numeric|digits_between:9,10',
            'nis' => 'required|numeric|digits_between:8,15',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jmlh_saudara' => 'required|integer',
            'anak_ke' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'jenis_tmpt_tinggal' => 'required|in:Bersama Orang Tua,Bersama Wali,Kost,Asrama,Panti Asuhan,Lainnya',
            'alamat' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'jarak' => 'required|in:< 1KM,1KM-5KM,> 5KM',
            'transportasi' => 'required|in:Jalan kaki,Kendaraan Pribadi,Kendaraan Umum/Angkot,Jemputan Sekolah,Ojek,Sepeda,Lainnya',

            'no_kk' => 'required|numeric|digits:16',
            'kepala_keluarga' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|numeric|digits:16',
            'thn_lahir_ayah' => 'required|digits:4',
            'pendidikan_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|numeric|digits:16',
            'thn_lahir_ibu' => 'required|digits:4',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',

            'asal_sekolah' => 'required|string|max:255',
            'jenjang' => 'required|in:PAUD,Sekolah Dasar,Sekolah Menegah Pertama,Sekolah Menegah Atas,Sekolah Menegah Kejuruan',
            'npsn' => 'required|numeric|digits_between:8,10',
        ]);

        // Update siswa
        $siswa->update([
            'nama_siswa' => $validated['nama_siswa'],
            'nisn' => $validated['nisn'],
            'nis' => $validated['nis'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jmlh_saudara' => $validated['jmlh_saudara'],
            'anak_ke' => $validated['anak_ke'],
            'foto' => $validated['foto'] ?? '',
            'status_pendaftaran' => 'verifikasi',
        ]);

        // Update atau buat data alamat
        $siswa->alamat()->updateOrCreate(
            ['siswa_id' => $siswa->id],
            [
                'jenis_tmpt_tinggal' => $validated['jenis_tmpt_tinggal'] ?? '',
                'alamat' => $validated['alamat'] ?? '',
                'desa' => $validated['desa'] ?? '',
                'kecamatan' => $validated['kecamatan'] ?? '',
                'jarak' => $validated['jarak'] ?? '',
                'transportasi' => $validated['transportasi'] ?? '',
            ]
        );

        // Update atau buat data orang tua
        $siswa->orangTua()->updateOrCreate(
            ['siswa_id' => $siswa->id],
            [
                'no_kk' => $validated['no_kk'] ?? '',
                'kepala_keluarga' => $validated['kepala_keluarga'] ?? '',
                'nama_ayah' => $validated['nama_ayah'] ?? '',
                'nik_ayah' => $validated['nik_ayah'] ?? '',
                'thn_lahir_ayah' => $validated['thn_lahir_ayah'] ?? '',
                'pendidikan_ayah' => $validated['pendidikan_ayah'] ?? '',
                'pekerjaan_ayah' => $validated['pekerjaan_ayah'] ?? '',
                'penghasilan_ayah' => $validated['penghasilan_ayah'] ?? '',
                'nama_ibu' => $validated['nama_ibu'] ?? '',
                'nik_ibu' => $validated['nik_ibu'] ?? '',
                'thn_lahir_ibu' => $validated['thn_lahir_ibu'] ?? '',
                'pendidikan_ibu' => $validated['pendidikan_ibu'] ?? '',
                'pekerjaan_ibu' => $validated['pekerjaan_ibu'] ?? '',
                'penghasilan_ibu' => $validated['penghasilan_ibu'] ?? '',
            ]
        );

        // Update atau buat data sekolah asal
        $siswa->sekolahAsal()->updateOrCreate(
            ['siswa_id' => $siswa->id],
            [
                'asal_sekolah' => $validated['asal_sekolah'] ?? '',
                'jenjang' => $validated['jenjang'] ?? '',
                'npsn' => $validated['npsn'] ?? '',
            ]
        );

        return redirect()->route('user.riwayat-pendaftaran.show', $siswa->uuid)->with('success', 'Data berhasil diperbarui.');

    }

    public function download(Siswa $siswa)
    {
        if ($siswa->user_id !== Auth::id()) {
            abort(403);
        }

        $siswa->load(['user', 'gelombang', 'alamat', 'orangTua', 'sekolahAsal']);

        $pdf = PDF::loadView('user.riwayat-pendaftaran.pdf', ['data' => $siswa]);

        return $pdf->download('formulir-pendaftaran-'.$siswa->nama_siswa.'.pdf');
    }

}
