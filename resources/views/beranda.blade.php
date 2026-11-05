@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="page-stack">
        <div class="card profile-hero">
            <span class="profile-label">Profil Instansi</span>
            <h2>Badan Kesatuan Bangsa dan Politik Kota Bogor</h2>
            <p>
                Badan Kesatuan Bangsa dan Politik (Bakesbangpol) Kota Bogor adalah unsur pelaksana
                pemerintah daerah yang bertanggung jawab dalam memelihara stabilitas politik,
                persatuan, dan keutuhan bangsa di tingkat lokal. Perannya meliputi penguatan
                wawasan kebangsaan, pembinaan politik dalam negeri, serta menjaga keharmonisan
                antar agama dan kelompok masyarakat.
            </p>
        </div>

        <div class="profile-grid">
            <div class="card">
                <h3>Peran &amp; Fungsi Utama</h3>
                <ul class="profile-list">
                    <li>Pembinaan politik dalam negeri untuk meningkatkan partisipasi masyarakat dalam demokrasi.</li>
                    <li>Penguatan wawasan kebangsaan, termasuk melalui kader KPWK.</li>
                    <li>Pemeliharaan kerukunan antar agama, suku, dan kelompok masyarakat.</li>
                    <li>Menjaga ketahanan sosial dan stabilitas Kota Bogor sebagai daerah penyangga ibu kota.</li>
                    <li>Koordinasi lintas sektor dalam urusan kesatuan bangsa dan politik.</li>
                    <li>Pembinaan dan pengawasan organisasi kemasyarakatan (ormas) serta LSM.</li>
                </ul>
            </div>

            <div class="card">
                <h3>Layanan</h3>
                <ul class="profile-list">
                    <li>Permohonan penelitian, PSG, dan magang.</li>
                    <li>Surat keterangan terdaftar ormas/parpol.</li>
                    <li>Laporan kegiatan partai politik dan ormas.</li>
                    <li>Surat rekomendasi partai politik.</li>
                    <li>Rekomendasi keramaian masyarakat.</li>
                    <li>Laporan kinerja KPWK.</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <h3>Jaringan Informasi Kearsipan Daerah</h3>
            <p>
                Aplikasi ini membantu pengelolaan arsip surat Bakesbangpol Kota Bogor secara
                digital. Gunakan menu <strong>Entri Surat</strong> untuk mencatat surat baru, lalu
                lihat riwayat surat yang sudah dibuat pada menu <strong>Daftar Surat</strong>.
            </p>
        </div>
    </div>
@endsection
