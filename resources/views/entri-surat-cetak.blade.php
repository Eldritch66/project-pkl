<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembar Disposisi — No. {{ $surat->no_urut }}</title>
    <style>
        @page {
            size: A4;
            margin: 15mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
            color: #000;
            background: #e5e7eb;
        }

        .sheet {
            width: 210mm;
            min-height: 297mm;
            margin: 20px auto;
            padding: 15mm;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .15);
        }

        .kop {
            padding-bottom: 6px;
            margin-bottom: 10px;
            text-align: center;
            border-bottom: 3px double #000;
        }

        .kop h3,
        .kop h2 {
            margin: 0;
            text-transform: uppercase;
        }

        .kop h3 {
            font-size: 13pt;
        }

        .kop h2 {
            font-size: 15pt;
        }

        .kop small {
            font-size: 9pt;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 4px 7px;
            vertical-align: top;
            border: 1px solid #000;
        }

        .title {
            font-size: 14pt;
            font-weight: bold;
            text-align: center;
        }

        .box {
            height: 28mm;
        }

        .cb {
            display: inline-block;
            width: 10px;
            height: 10px;
            margin-right: 6px;
            border: 1px solid #000;
        }

        .ttd {
            height: 35mm;
            text-align: center;
        }

        tr {
            page-break-inside: avoid;
        }

        .toolbar {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            width: 210mm;
            margin: 20px auto -10px;
        }

        .toolbar a,
        .toolbar button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 18px;
            border-radius: 8px;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            font-size: .9rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .toolbar a {
            background: #fff;
            color: #0f4c81;
            border: 1px solid #0f4c81;
        }

        .toolbar button {
            background: #0f4c81;
            color: #fff;
            border: 1px solid #0f4c81;
        }

        .flash {
            width: 210mm;
            margin: 16px auto -8px;
            padding: 10px 14px;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            background: #ecfdf5;
            color: #047857;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            font-size: .88rem;
        }

        @media print {
            body {
                background: #fff;
            }

            .sheet {
                width: auto;
                min-height: 0;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    @if (session('success'))
        <div class="flash no-print">{{ session('success') }}</div>
    @endif

    <div class="toolbar no-print">
        <a href="{{ route('entri-surat') }}">Kembali</a>
        <button type="button" onclick="window.print()">Cetak</button>
    </div>

    <div class="sheet">
        <div class="kop">
            <h3>Pemerintah Daerah Kota Bogor</h3>
            <h2>Badan Kesatuan Bangsa dan Politik</h2>
            <small>Alamat instansi &middot; Telp. xxx</small>
        </div>

        <table>
            <tr>
                <td colspan="2" class="title">LEMBAR DISPOSISI</td>
                <td width="26%">No. Agenda<br><b>{{ $surat->no_urut }}</b></td>
            </tr>
            <tr>
                <td width="14%">Surat dari</td>
                <td colspan="2">: {{ $surat->dari }}</td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td>: {{ $surat->nomor_surat ?: '-' }}</td>
                <td>Tgl Terima : {{ $surat->tanggal_terima->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ $surat->tanggal_surat->locale('id')->translatedFormat('d F Y') }}</td>
                <td>Kode : {{ $surat->klasifikasi_kode }} - {{ $surat->klasifikasi_nama }}</td>
            </tr>
            <tr>
                <td>Berkas</td>
                <td>: {{ $surat->nama_berkas }}</td>
                <td>Sifat : {{ ucfirst($surat->sifat_surat) }}</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>: {{ $surat->perihal }}</td>
                <td>Wilayah : {{ $surat->wilayah_kota }}</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>: {{ $surat->lampiran_jumlah }} {{ $surat->lampiran_satuan }}</td>
                <td>Halaman : {{ $surat->halaman_jumlah }} {{ $surat->halaman_satuan }}</td>
            </tr>
            <tr>
                <td>Tingkat</td>
                <td>: {{ ucfirst($surat->tingkat_perkembangan) }}</td>
                <td>Kelompok : {{ ucwords(str_replace('_', ' ', $surat->kelompok_surat)) }}</td>
            </tr>
            <tr>
                <td colspan="3" class="box"><b>Informasi :</b><br>{{ $surat->ringkasan }}</td>
            </tr>
            <tr>
                <td colspan="2" class="box">
                    <b>Diteruskan Kepada :</b><br>
                    -
                </td>
                <td>
                    <b>Dengan hormat mohon :</b><br>
                    <span class="cb"></span>Menghadap Saya<br>
                    <span class="cb"></span>Tindaklanjuti / Selesaikan<br>
                    <span class="cb"></span>Koordinasikan / Konsultasikan<br>
                    <span class="cb"></span>Layani Sesuai Prosedur
                </td>
            </tr>
            <tr>
                <td colspan="3"><b>Catatan Pimpinan</b><br>-</td>
            </tr>
            <tr>
                <td colspan="3" class="ttd">
                    Kepala Badan<br><br><br><br>
                    <u>Hidayatulloh, S.P., M.Si</u><br>NIP. 197407042006041010
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
