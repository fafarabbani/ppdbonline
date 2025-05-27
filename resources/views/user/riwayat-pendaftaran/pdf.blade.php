<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Bukti Pendaftaran Peserta Didik Baru</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 2cm;
        }

        .judul {
            text-align: center;
            margin-top: 20px;
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
        }

        .subjudul {
            text-align: center;
            font-size: 12pt;
            margin-top: 5px;
            font-weight: bold;
        }

        .isi {
            margin-top: 10px;
            font-size: 12pt;
        }

        .isi table {
            width: 100%;
            margin-left: 10px;
            border-collapse: collapse;
        }

        .isi td {
            padding: 5px;
            vertical-align: top;
        }

        .ttd {
            margin-top: 40px;
            margin-left: 350px;
            text-align: left;
        }

        .ttd span {
            margin-bottom: none;
        }

        .ttd p {
            margin-bottom: 70px;
        }

        @media print {
            .kop img {
                width: 80px !important;
                height: 80px !important;
            }
        }
    </style>
</head>

<body>

    <img src="assets/kop.jpg" alt="Kop Surat" style="width: 550px; height: 100px; ">

    <div class="judul">
        BUKTI PENDAFTARAN
    </div>
    <div class="subjudul">
        PANITIA PENERIMAAN PESERTA DIDIK BARU (PPDB)<br>
        SD ISLAM NURUL HAQ BATAM TAHUN AJARAN
        {{ $data->gelombang->tanggal_mulai->format('Y') }}/{{ $data->gelombang->tanggal_mulai->addYear()->format('Y') }}.
    </div>

    <div class="isi">
        <p>Yang bertanda tangan di bawah ini Ketua Panitia PPDB SD ISLAM NURUL HAQ BATAM menerangkan bahwa:</p>
        <table>
            <tr>
                <td>Nomor Registrasi</td>
                <td>: <strong>{{ $data->nomor_registrasi }}</strong></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>: <strong>{{ $data->nama_siswa }}</strong></td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>: {{ $data->nisn }}</td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>: {{ $data->tempat_lahir }},
                    {{ \Carbon\Carbon::parse($data->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>: {{ $data->sekolahAsal->asal_sekolah ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $data->alamat->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td>: {{ $data->orangTua->nama_ayah ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td>: {{ $data->orangTua->nama_ibu ?? '-' }}</td>
            </tr>
        </table>

        <p>Telah melakukan pendaftaran sebagai peserta didik baru pada SD ISlAM NURUL HAQ untuk Tahun Pelajaran
            {{ $data->gelombang->tanggal_mulai->format('Y') }}/{{ $data->gelombang->tanggal_mulai->addYear()->format('Y') }}.
            . Demikian surat bukti pendaftaranini dibuat untuk dapat dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <div class="ttd">
        <span>Batam, {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</span>
        <p>Panitia PPDB</p>
        <p><strong>Suriani, S.Pd.SD</strong><br>NIP. 19650410 199003 1 001</p>
    </div>

</body>

</html>
