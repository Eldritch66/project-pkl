@extends('layouts.app')

@section('title', 'SIMARDI — Bakesbangpol Kota Bogor')

@section('content')
    @php
        $user = auth()->user();
        $isPemohon = $user?->isPemohon() ?? false;
    @endphp

    <div class="home-layout">
        <section class="card about-card">
            <span class="profile-label">Profil Instansi</span>
            <h2>Badan Kesatuan Bangsa dan Politik Kota Bogor</h2>

            <p>
                Bakesbangpol Kota Bogor adalah unsur pelaksana pemerintah daerah yang bertanggung jawab
                dalam memelihara stabilitas politik, persatuan, dan keutuhan bangsa di tingkat lokal.
            </p>

            <ul class="about-list">
                <li>Pembinaan politik dalam negeri dan penguatan wawasan kebangsaan.</li>
                <li>Pemeliharaan kerukunan antar agama, suku, dan kelompok masyarakat.</li>
                <li>Pembinaan serta pengawasan organisasi kemasyarakatan (ormas).</li>
                <li>Pelayanan administrasi surat dan disposisi secara terpadu.</li>
            </ul>

            <div class="about-app">
                <h3>Apa itu SIMARDI?</h3>
                <p>
                    SIMARDI adalah Sistem Informasi Manajemen Arsip dan Disposisi yang membantu
                    pengelolaan surat masuk, disposisi, dan pengunggahan berkas surat keterangan
                    di lingkungan Bakesbangpol Kota Bogor.
                </p>
            </div>
        </section>

        <aside class="menu-column" aria-label="Menu utama">
            @auth
                <div class="account-bar">
                    <div>
                        <span class="account-label">Masuk sebagai</span>
                        <strong>{{ auth()->user()->name }}</strong>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn-logout">Keluar</button>
                    </form>
                </div>
            @else
                <div class="account-bar">
                    <div>
                        <span class="account-label">Selamat datang</span>
                        <strong>Masuk untuk mengakses layanan</strong>
                    </div>
                    <a href="{{ route('login') }}" class="btn-logout">Masuk</a>
                </div>
            @endauth

            <x-menu-card
                number="1"
                title="Daftar Surat"
                description="Lihat seluruh surat masuk yang telah dicatat beserta status disposisinya."
                :href="route('daftar-surat')"
                badge="Khusus petugas"
                :locked="$isPemohon"
            />

            <x-menu-card
                number="2"
                title="Disposisi"
                description="Catat surat masuk baru dan buat lembar disposisi siap cetak."
                :href="route('disposisi.index')"
                badge="Khusus petugas"
                :locked="$isPemohon"
            />

            <x-menu-card
                number="3"
                title="Surat SK"
                description="Unggah berkas persyaratan surat keterangan magang, penelitian, dan kegiatan lainnya."
                :href="route('sk.index')"
            />
        </aside>
    </div>
@endsection
