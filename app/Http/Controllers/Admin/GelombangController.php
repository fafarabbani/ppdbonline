<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Gelombang;
use Illuminate\Http\RedirectResponse;

class GelombangController extends Controller
{
    /**
     * Write code on Method
     * 
     * @return response()
     * 
     */
    public function index() {
        //get all Gelombang
        $data = Gelombang::withCount('siswa')->latest()->paginate(10);

        Carbon::setLocale('id');

        // Format tanggal menggunakan Carbon
        foreach ($data as $items) {
            $items->tanggal_mulai_formatted = Carbon::parse($items->tanggal_mulai)->isoFormat('DD MMMM YYYY');
            $items->tanggal_selesai_formatted = Carbon::parse($items->tanggal_selesai)->isoFormat('DD MMMM YYYY');

            // Tahun angkatan dari tanggal mulai
            $tahun = Carbon::parse($items->tanggal_mulai)->year;
            $items->tahun_angkatan = $tahun;

            // Cek jika jumlah siswa >= kuota, ubah status ke 'Tutup'
            if ($items->siswa_count >= $items->kuota && $items->status !== 'Tutup') {
                $items->status = 'Tutup';
                $items->save();
            }
        }

        return view('admin.gelombang.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //Validasi Data
        $validatedData = $request->validate([
            'tanggal_mulai'     => 'required|date',
            'tanggal_selesai'   => 'required|date|after_or_equal:tanggal_mulai',
            'kuota'             => 'required|integer|min:1',
            'status'            => 'nullable',
        ]);

        try {
            // Mendapatkan tahun mulai Gelombang
            $tahunMulai = Carbon::parse($validatedData['tanggal_mulai'])->year;

            // Cek apakah sudah ada gelombang pada tahun tersebut
            $gelombang = Gelombang::whereYear('tanggal_mulai', $tahunMulai)->count();

            // Set gelombang ke 1 jika belum ada data untuk tahun tersebut
            if ($gelombang === 0) {
                $validatedData['gelombang'] = 1;
            } else {
                $validatedData['gelombang'] = $gelombang + 1;
            }

            // Buat Tahun Ajaran here
            Gelombang::create($validatedData);

            return redirect()->route('admin.gelombang.index')->with('success', 'Data Berhasil Disimpan!');
        } catch (\Exception $e) {
            return redirect()->route('admin.gelombang.index')->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gelombang $gelombang)
    {
        // Ambil semua siswa yang terdaftar di gelombang ini
        $siswa = $gelombang->siswa()->with(['user', 'alamat', 'orangTua', 'sekolahAsal'])->get();
        
        return view('admin.gelombang.show', 
        [
            'data' => $gelombang,
            'siswa' => $siswa,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gelombang $gelombang)
    {
        return view('admin.gelombang.edit', ['data' => $gelombang]);
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gelombang $gelombang): RedirectResponse
    {
        //validate form
        $request->validate([
            'tanggal_mulai'     => 'required|date',
            'tanggal_selesai'   => 'required|date|after_or_equal:tanggal_mulai',
            'kuota'             => 'required|integer|min:1',
            'status'            => 'required|in:Buka,Tutup',
        ]);

        try {
            $gelombang->update([
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'kuota'           => $request->kuota,
            'status'          => $request->status,
            'gelombang'       => $gelombang,  // Pastikan gelombang yang sudah ada tetap dipertahankan
        ]);

            return redirect()->route('admin.gelombang.index')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            return redirect()->route('admin.gelombang.index')->with('fail', $e->getMessage());
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gelombang $gelombang)
    {
        try {
            $gelombang->delete();
            return redirect()->route('admin.gelombang.index')->with('success', 'Data Berhasil Di Hapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.gelombang.index')->with('fail', $e->getMessage());
        }
    }
}
