@extends('layouts.app')

@section('title', 'Bakesbangpol Kota Bogor — SIMARDI')

@section('content')
    @php
        $user = auth()->user();
        $isPetugas = $user?->isPetugas() ?? false;
    @endphp

    <div class="flex flex-col gap-[34px]">
        {{-- Hero --}}
        <section
            class="grid grid-cols-1 items-center gap-8 rounded-2xl bg-gradient-to-br from-primary to-[#16679f] p-6 text-white sm:p-8 lg:grid-cols-[1.35fr_.65fr] lg:p-11">
            <div>
                <span
                    class="inline-block rounded-full border border-white/40 bg-white/10 px-3.5 py-1 text-xs font-bold uppercase tracking-wider">
                    Badan Kesatuan Bangsa dan Politik
                </span>
                <h1 class="mb-3 mt-4 text-[1.65rem] font-bold leading-tight tracking-tight sm:text-[2.1rem]">
                    Melayani Masyarakat Kota Bogor dengan Tertib, Cepat, dan Terpadu
                </h1>
                <p class="m-0 max-w-[56ch] text-base leading-relaxed text-white/90">
                    Bakesbangpol Kota Bogor menghadirkan layanan administrasi surat secara online
                    melalui SIMARDI. Ajukan surat keterangan dan pantau berkas Anda tanpa harus
                    datang berulang kali ke kantor.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('buat-surat') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-white bg-white px-6 py-3 text-sm font-bold text-primary no-underline hover:bg-slate-100">
                        Buat Surat
                    </a>
                    <a href="#tentang"
                        class="inline-flex items-center justify-center rounded-lg border border-white/65 bg-transparent px-6 py-3 text-sm font-bold text-white no-underline hover:bg-white/15">
                        Kenali Bakesbangpol
                    </a>
                </div>
            </div>

            <div class="rounded-xl border border-white/25 bg-white/10 p-5">
                <h2 class="mb-3.5 mt-0 text-sm font-bold uppercase tracking-wider text-white">Alur Pengajuan</h2>
                <ol class="m-0 flex list-none flex-col gap-3 p-0">
                    <li class="flex items-start gap-2.5 text-sm leading-snug text-white/90">
                        <span
                            class="flex h-6 w-6 flex-none items-center justify-center rounded-full bg-white text-xs font-bold text-primary">1</span>
                        <span>Pilih jenis surat yang dibutuhkan.</span>
                    </li>
                    <li class="flex items-start gap-2.5 text-sm leading-snug text-white/90">
                        <span
                            class="flex h-6 w-6 flex-none items-center justify-center rounded-full bg-white text-xs font-bold text-primary">2</span>
                        <span>Masuk dan unggah berkas persyaratan.</span>
                    </li>
                    <li class="flex items-start gap-2.5 text-sm leading-snug text-white/90">
                        <span
                            class="flex h-6 w-6 flex-none items-center justify-center rounded-full bg-white text-xs font-bold text-primary">3</span>
                        <span>Petugas memverifikasi dan memproses surat Anda.</span>
                    </li>
                </ol>
            </div>
        </section>

        {{-- Tentang --}}
        <section class="flex flex-col gap-[18px]" id="tentang">
            <div class="max-w-[68ch]">
                <span class="inline-block rounded-full bg-primary-light px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary">
                    Tentang Kami
                </span>
                <h2 class="mb-2 mt-2.5 text-2xl font-bold leading-tight text-primary">
                    Badan Kesatuan Bangsa dan Politik Kota Bogor
                </h2>
                <p class="m-0 leading-relaxed text-slate-500">
                    Bakesbangpol Kota Bogor adalah unsur pelaksana pemerintah daerah yang bertanggung
                    jawab dalam memelihara stabilitas politik, persatuan, dan keutuhan bangsa di
                    tingkat lokal.
                </p>
            </div>

            <div class="grid grid-cols-1 items-start gap-5 lg:grid-cols-[1.1fr_.9fr]">
                <div class="space-y-3.5">
                    <p class="m-0 leading-relaxed">
                        Kami mendukung terciptanya suasana kondusif di Kota Bogor melalui pembinaan
                        politik dalam negeri, penguatan wawasan kebangsaan, serta pemeliharaan
                        kerukunan antar agama, suku, dan kelompok masyarakat.
                    </p>
                    <p class="m-0 leading-relaxed">
                        Selain itu, Bakesbangpol membina dan mengawasi organisasi kemasyarakatan
                        (ormas) serta menyalurkan layanan administrasi surat dan disposisi secara
                        terpadu bagi masyarakat dan instansi terkait.
                    </p>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <h3 class="mb-3 mt-0 text-base font-semibold text-primary">Tugas dan Fungsi Utama</h3>
                    <ul class="m-0 list-none p-0">
                        <li class="relative border-b border-slate-200 py-2 pl-6 text-sm leading-snug before:absolute before:left-0 before:top-2 before:font-bold before:text-emerald-700 before:content-['✓'] last:border-0 last:pb-0">
                            Pembinaan politik dalam negeri dan penguatan wawasan kebangsaan.
                        </li>
                        <li class="relative border-b border-slate-200 py-2 pl-6 text-sm leading-snug before:absolute before:left-0 before:top-2 before:font-bold before:text-emerald-700 before:content-['✓'] last:border-0 last:pb-0">
                            Pemeliharaan kerukunan antar agama, suku, dan kelompok masyarakat.
                        </li>
                        <li class="relative border-b border-slate-200 py-2 pl-6 text-sm leading-snug before:absolute before:left-0 before:top-2 before:font-bold before:text-emerald-700 before:content-['✓'] last:border-0 last:pb-0">
                            Pembinaan serta pengawasan organisasi kemasyarakatan (ormas).
                        </li>
                        <li class="relative border-b border-slate-200 py-2 pl-6 text-sm leading-snug before:absolute before:left-0 before:top-2 before:font-bold before:text-emerald-700 before:content-['✓'] last:border-0 last:pb-0">
                            Pelayanan administrasi surat dan disposisi secara terpadu.
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        {{-- Layanan --}}
        <section class="flex flex-col gap-[18px]" id="layanan">
            <div class="max-w-[68ch]">
                <span class="inline-block rounded-full bg-primary-light px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary">
                    Layanan
                </span>
                <h2 class="mb-2 mt-2.5 text-2xl font-bold leading-tight text-primary">Layanan Surat Online</h2>
                <p class="m-0 leading-relaxed text-slate-500">
                    Pilih layanan yang sesuai dengan kebutuhan Anda, lalu ajukan langsung melalui SIMARDI.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-[18px] md:grid-cols-3">
                <article class="flex flex-col gap-2.5 rounded-xl border border-slate-200 bg-white p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-primary-light text-xl font-bold text-primary"
                        aria-hidden="true">&#128196;</span>
                    <h3 class="m-0 text-base font-semibold">Surat Keterangan</h3>
                    <p class="m-0 flex-1 text-sm leading-relaxed text-slate-500">
                        Pengajuan surat keterangan magang, penelitian, dan kegiatan lainnya
                        dengan mengunggah berkas persyaratan secara online.
                    </p>
                    <a href="{{ route('buat-surat') }}" class="self-start text-sm font-bold text-primary no-underline hover:underline">
                        Ajukan surat &rarr;
                    </a>
                </article>

                <article class="flex flex-col gap-2.5 rounded-xl border border-slate-200 bg-white p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-primary-light text-xl font-bold text-primary"
                        aria-hidden="true">&#128221;</span>
                    <h3 class="m-0 text-base font-semibold">Rekomendasi &amp; Kegiatan</h3>
                    <p class="m-0 flex-1 text-sm leading-relaxed text-slate-500">
                        Permohonan rekomendasi serta pemberitahuan kegiatan organisasi
                        kemasyarakatan dan partai politik di wilayah Kota Bogor.
                    </p>
                    <a href="{{ route('buat-surat') }}" class="self-start text-sm font-bold text-primary no-underline hover:underline">
                        Lihat layanan &rarr;
                    </a>
                </article>

                <article class="flex flex-col gap-2.5 rounded-xl border border-slate-200 bg-white p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-primary-light text-xl font-bold text-primary"
                        aria-hidden="true">&#128193;</span>
                    <h3 class="m-0 text-base font-semibold">Arsip &amp; Disposisi</h3>
                    <p class="m-0 flex-1 text-sm leading-relaxed text-slate-500">
                        Pengelolaan surat masuk, disposisi, dan arsip digital yang digunakan
                        oleh petugas Bakesbangpol Kota Bogor.
                    </p>
                    @if ($isPetugas)
                        <a href="{{ route('daftar-surat') }}" class="self-start text-sm font-bold text-primary no-underline hover:underline">
                            Buka daftar surat &rarr;
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="self-start text-sm font-bold text-primary no-underline hover:underline">
                            Masuk sebagai petugas &rarr;
                        </a>
                    @endif
                </article>
            </div>
        </section>

        {{-- CTA --}}
        <section
            class="flex flex-wrap items-center justify-between gap-5 rounded-2xl border border-[#c7d9ea] bg-primary-light px-6 py-8 sm:px-9">
            <div>
                <h2 class="mb-1.5 mt-0 text-xl font-bold text-primary">Siap mengajukan surat?</h2>
                <p class="m-0 text-sm leading-relaxed text-[#375a78]">
                    Mulai pengajuan sekarang dan unggah berkas persyaratan Anda secara online.
                </p>
            </div>
            <a href="{{ route('buat-surat') }}" class="btn-primary">Buat Surat</a>
        </section>
    </div>
@endsection
