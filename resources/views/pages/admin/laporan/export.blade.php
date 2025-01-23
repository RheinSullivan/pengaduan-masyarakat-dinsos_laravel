<!DOCTYPE html>
<html>
<head>
    <title>Surat Keterangan</title>
    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .kop-surat {
            justify-content: center;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .kop-surat img {
            width: 100px;
            height: auto;
            position: absolute;
            top: 10px;
            left: 20px;
        }
        .kop-surat h1, .kop-surat h3 {
            margin: 0;
        }
        .kop-surat h3{
            font-size: 20px;
        }
        .kop-surat p {
            margin: 5px 0;
            font-size: 12px;
        }
        .content {
            margin-top: 50px;
            line-height: 1.6;
        }
        .content h4 {
            text-align: center;
            text-decoration: underline;
        }
        .content p {
            margin: 5px 0;
            font-size: 12px;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature p {
            margin: 5px 0;
            font-size: 12px;
        }
        .footer {
            margin-top: 50px;
            font-size: 12px;
            text-align: center;
        }
        .pelapor-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <img src="{{ public_path('assets/img/favicon.png') }}" alt="Logo Dinas Sosial">
        <h3>PEMERINTAH KABUPATEN CIREBON</h3>
        <h2>DINAS SOSIAL</h2>
        <p>Jln. Sunan Drajat No. 16 Telp/Fax. (0231) 321728 SUMBER</p>
        <p>Email: dinsos.kabcirebon@yahoo.co.id | Kode Pos 45611</p>
        <hr>
    </div>

    <div class="content">
        <h4>SURAT KETERANGAN</h4>

        @foreach($pengaduan as $i)
        <div class="pelapor-item">
            <p><strong>Pelapor : {{ $loop->iteration }}</strong></p>
            @foreach($pengaduan as $k => $i)
            <p>Nama : {{ $i->user->name }}</p>
            @endforeach
            <p>NIK : {{ $i->nik }}</p>
            <p>Alamat : {{ $i->lokasi_kejadian }}</p>
            <p>Tanggal Pelaporan : {{ \Carbon\Carbon::parse($i->tgl_kejadian)->format('d-m-Y') }}</p>
        </div>
        @endforeach

        <p>Isi keterangan laporan:</p>
        @foreach($pengaduan as $i)
        <p>{{ $i->isi_laporan }}</p>
        <br>
        <p style="font-size: 12px;">Lokasi Kejadian: {{ $i->lokasi_kejadian }}</p>
        @endforeach

        <div class="signature">
            <p>Ditetapkan di: Cirebon</p>
            <p>Pada tanggal: {{ \Carbon\Carbon::parse($i->tgl_pengaduan)->format('d-m-Y') }}</p>
            <br><br>
            <p>KEPALA DINAS SOSIAL</p>
            <p>KABUPATEN CIREBON</p>
            <br><br><br>
            <p><strong>Dra. INDRA FITRIANI, MM</strong></p>
            <p>NIP: 19690110 198803 2 001</p>
        </div>
    </div>

    <div class="footer">
        <p>Dokumen ini telah ditandatangani secara elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik (BSrE), BSSN.</p>
    </div>
</body>
</html>
