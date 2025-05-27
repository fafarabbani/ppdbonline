<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Siswa;
use App\Models\Alamat;
use App\Models\OrangTua;
use App\Models\SekolahAsal;
use App\Models\Gelombang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PendaftaranSiswa extends Component
{
    public $step = 1;

    // Data step 1 - Siswa
    public $gelombang_id;
    public $nomor_registrasi;
    public $nama_siswa;
    public $nisn;
    public $nis;
    public $jenis_kelamin;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jmlh_saudara;
    public $anak_ke;
    public $foto;
    public $status_pendaftaran = 'pending';

    // Data step 2 - Alamat
    public $jenis_tmpt_tinggal;
    public $alamat;
    public $desa;
    public $kecamatan;
    public $jarak;
    public $transportasi;

    // Data step 3 - Orang Tua
    public $no_kk;
    public $kepala_keluarga;
    public $nama_ayah;
    public $nik_ayah;
    public $thn_lahir_ayah;
    public $pendidikan_ayah;
    public $pekerjaan_ayah;
    public $penghasilan_ayah;
    public $nama_ibu;
    public $nik_ibu;
    public $thn_lahir_ibu;
    public $pendidikan_ibu;
    public $pekerjaan_ibu;
    public $penghasilan_ibu;
    
    // Data step 4 - Alamat
    public $asal_sekolah;
    public $jenjang;
    public $npsn;

    // Untuk simpan model Gelombang
    public $gelombang;
    
    public function mount($gelombang_uuid, $uuid)
    {
        $user = Auth::user();
        if ($user->uuid !== $uuid) {
            abort(403);
        }

        // $this->user_uuid = $uuid;
        // $this->gelombang_uuid = $gelombang_uuid;

        // Ambil data gelombang berdasarkan UUID dari parameter route
        $this->gelombang = Gelombang::where('uuid', $gelombang_uuid)
                            ->where('status', 'Buka')
                            ->firstOrFail();

        $tahun = now()->year;

        // Ambil gelombang saat ini
        $gelombang = Gelombang::where('uuid', $gelombang_uuid)->firstOrFail();
        $this->gelombang_id = $gelombang->id;

        // Hitung total gelombang tahun ini
        $jumlahGelombangTahunIni = Gelombang::whereYear('created_at', $tahun)->count();

        // Tentukan urutan gelombang ini dalam tahun berjalan
        $kodeTahunGelombang = Gelombang::whereYear('created_at', $tahun)
            ->where('created_at', '<=', $gelombang->created_at)
            ->count();

        // Hitung jumlah siswa yang sudah daftar di gelombang ini
        $jumlahSiswa = Siswa::where('gelombang_id', $gelombang->id)->count();

        // Buat nomor registrasi otomatis
        $this->nomor_registrasi = sprintf(
            'REG-%d%d%03d%03d',
            $tahun,
            $jumlahGelombangTahunIni,
            $kodeTahunGelombang,
            $jumlahSiswa + 1
        );
    }

    // Validasi per step
    protected $rulesStep1 = [
        'gelombang_id' => 'required|exists:gelombang,id',
        'nomor_registrasi' => 'required|unique:siswa,nomor_registrasi',
        'nama_siswa' => 'required|string|max:255',
        'nisn' => 'required',
        'nis' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jmlh_saudara' => 'required|integer',
        'anak_ke' => 'required|integer',
        // 'foto' => 'nullable',
    ];
    protected $rulesStep2 = [
        'jenis_tmpt_tinggal' => 'required',
        'alamat' => 'required',
        'desa' => 'required',
        'kecamatan' => 'required',
        'jarak' => 'required',
        'transportasi' => 'required',
    ];
    protected $rulesStep3 = [
        'no_kk' => 'required',
        'kepala_keluarga' => 'required',
        'nama_ayah' => 'required',
        'nik_ayah' => 'required',
        'thn_lahir_ayah' => 'required',
        'pendidikan_ayah' => 'required',
        'pekerjaan_ayah' => 'required',
        'penghasilan_ayah' => 'required',
        'nama_ibu' => 'required',
        'nik_ibu' => 'required',
        'thn_lahir_ibu' => 'required',
        'pendidikan_ibu' => 'required',
        'pekerjaan_ibu' => 'required',
        'penghasilan_ibu' => 'required',
    ];
    protected $rulesStep4 = [
        'asal_sekolah' => 'required',
        'jenjang' => 'required',
        'npsn' => 'required',
    ];

    public function updated($propertyName)
    {
        // Validasi hanya step sekarang
        if ($this->step == 1) {
            $this->validateOnly($propertyName, $this->rulesStep1);
        } elseif ($this->step == 2) {
            $this->validateOnly($propertyName, $this->rulesStep2);
        } elseif ($this->step == 3) {
            $this->validateOnly($propertyName, $this->rulesStep3);
        } elseif ($this->step == 4) {
            $this->validateOnly($propertyName, $this->rulesStep4);
        }
    }

    // Lanjut ke step berikutnya
    public function nextStep()
    {
        if ($this->step == 1) {
            $this->validate($this->rulesStep1);
            $this->step++;
        } elseif ($this->step == 2) {
            $this->validate($this->rulesStep2);
            $this->step++;
        } elseif ($this->step == 3) {
            $this->validate($this->rulesStep3);
            $this->step++;
        }
    }
    
    // Kembali ke step sebelumnya
    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    // Simpan semua data ke database
    public function submit()
    {
        $this->validate($this->rulesStep4);

        // Simpan Siswa
        $siswa = Siswa::create([
            'user_id' => Auth::id(),
            'gelombang_id' => $this->gelombang_id,
            'nomor_registrasi' => $this->nomor_registrasi,
            'nama_siswa' => $this->nama_siswa,
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jmlh_saudara' => $this->jmlh_saudara,
            'anak_ke' => $this->anak_ke,
            'foto' => $this->foto,
        ]);

        // Simpan Alamat
        Alamat::create([
            'siswa_id' => $siswa->id,
            'jenis_tmpt_tinggal' => $this->jenis_tmpt_tinggal,
            'alamat' => $this->alamat,
            'desa' => $this->desa,
            'kecamatan' => $this->kecamatan,
            'jarak' => $this->jarak,
            'transportasi' => $this->transportasi,
        ]);

        // Simpan Orangtua
        OrangTua::create([
            'siswa_id' => $siswa->id,
            'no_kk' => $this->no_kk,
            'kepala_keluarga' => $this->kepala_keluarga,
            'nama_ayah' => $this->nama_ayah,
            'nik_ayah' => $this->nik_ayah,
            'thn_lahir_ayah' => $this->thn_lahir_ayah,
            'pendidikan_ayah' => $this->pendidikan_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'penghasilan_ayah' => $this->penghasilan_ayah,
            'nama_ibu' => $this->nama_ibu,
            'nik_ibu' => $this->nik_ibu,
            'thn_lahir_ibu' => $this->thn_lahir_ibu,
            'pendidikan_ibu' => $this->pendidikan_ibu,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'penghasilan_ibu' => $this->penghasilan_ibu,
        ]);

        // Simpan Sekolah Asal
        SekolahAsal::create([
            'siswa_id' => $siswa->id,
            'asal_sekolah' => $this->asal_sekolah,
            'jenjang' => $this->jenjang,
            'npsn' => $this->npsn,
        ]);

        session()->flash('success', 'Pendaftaran berhasil, nomor registrasi: ' . $this->nomor_registrasi);

        // Redirect ke halaman sukses / dashboard
        return redirect()->route('user.dashboard', Auth::user()->uuid);
    }

    public function render()
    {
        return view('livewire.pendaftaran-siswa');
    }


}
