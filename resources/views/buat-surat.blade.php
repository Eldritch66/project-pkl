@extends('layouts.app')

@section('title', 'Buat Surat — SIMARDI')

@section('content')
    <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke Beranda</a>

    <div class="flex flex-col gap-[18px]">
        <div class="rounded-xl border border-slate-200 bg-white p-6">
            <span class="inline-block rounded-full bg-primary-light px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary">
                Layanan Surat
            </span>
            <h2 class="mb-0 mt-2.5">Buat Surat</h2>
            <p class="mb-0 mt-1 text-sm leading-relaxed text-slate-500">
                Pilih jenis surat yang Anda butuhkan. Setelah memilih, Anda akan diarahkan untuk
                masuk dan mengunggah berkas persyaratan melalui SIMARDI.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4">
                <span class="flex h-7 w-7 flex-none items-center justify-center rounded-full bg-primary-light text-xs font-bold text-primary">1</span>
                <div>
                    <strong class="mb-1 block text-sm">Pilih jenis surat</strong>
                    <span class="text-xs leading-snug text-slate-500">Sesuaikan dengan keperluan Anda.</span>
                </div>
            </div>
            <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4">
                <span class="flex h-7 w-7 flex-none items-center justify-center rounded-full bg-primary-light text-xs font-bold text-primary">2</span>
                <div>
                    <strong class="mb-1 block text-sm">Masuk &amp; unggah berkas</strong>
                    <span class="text-xs leading-snug text-slate-500">Unggah persyaratan berformat PDF atau gambar.</span>
                </div>
            </div>
            <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4">
                <span class="flex h-7 w-7 flex-none items-center justify-center rounded-full bg-primary-light text-xs font-bold text-primary">3</span>
                <div>
                    <strong class="mb-1 block text-sm">Tunggu verifikasi</strong>
                    <span class="text-xs leading-snug text-slate-500">Petugas memproses dan memverifikasi berkas Anda.</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-[18px] lg:grid-cols-2">
            <article class="flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-6">
                <h3 class="m-0 text-base font-semibold text-primary">Surat Keterangan Magang / PKL</h3>
                <p class="m-0 text-sm leading-relaxed text-slate-500">
                    Untuk mahasiswa atau siswa yang akan melaksanakan magang atau praktik kerja lapangan.
                </p>
                <ul class="m-0 flex-1 list-none p-0">
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Surat pengantar dari kampus atau sekolah.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Kartu tanda mahasiswa / pelajar.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Proposal atau rencana kegiatan magang.
                    </li>
                </ul>
                <a href="{{ route('sk.index') }}" class="btn-primary mt-1 self-start">Ajukan Surat</a>
            </article>

            <article class="flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-6">
                <h3 class="m-0 text-base font-semibold text-primary">Surat Keterangan Penelitian</h3>
                <p class="m-0 text-sm leading-relaxed text-slate-500">
                    Untuk peneliti atau mahasiswa yang melakukan penelitian di wilayah Kota Bogor.
                </p>
                <ul class="m-0 flex-1 list-none p-0">
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Surat pengantar dari instansi atau kampus.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Proposal penelitian.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Identitas peneliti.
                    </li>
                </ul>
                <a href="{{ route('sk.index') }}" class="btn-primary mt-1 self-start">Ajukan Surat</a>
            </article>

            <article class="flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-6">
                <h3 class="m-0 text-base font-semibold text-primary">Surat Keterangan Terdaftar</h3>
                <p class="m-0 text-sm leading-relaxed text-slate-500">
                    Untuk organisasi kemasyarakatan atau partai politik yang memerlukan keterangan terdaftar.
                </p>
                <ul class="m-0 flex-1 list-none p-0">
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Akta pendirian organisasi.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Surat keputusan pengurus.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Domisili sekretariat organisasi.
                    </li>
                </ul>
                <a href="{{ route('sk.index') }}" class="btn-primary mt-1 self-start">Ajukan Surat</a>
            </article>

            <article class="flex flex-col gap-3 rounded-xl border border-slate-200 bg-white p-6">
                <h3 class="m-0 text-base font-semibold text-primary">Rekomendasi Kegiatan</h3>
                <p class="m-0 text-sm leading-relaxed text-slate-500">
                    Untuk permohonan rekomendasi pelaksanaan kegiatan ormas atau partai politik.
                </p>
                <ul class="m-0 flex-1 list-none p-0">
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Surat permohonan rekomendasi.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Proposal kegiatan.
                    </li>
                    <li class="relative py-1 pl-5 text-sm leading-snug before:absolute before:left-0 before:top-1 before:font-bold before:text-primary before:content-['•']">
                        Susunan kepanitiaan.
                    </li>
                </ul>
                <a href="{{ route('sk.index') }}" class="btn-primary mt-1 self-start">Ajukan Surat</a>
            </article>
        </div>

        @guest
            <div class="rounded-xl border border-slate-200 bg-white p-6">
                <p class="m-0 text-sm leading-relaxed text-slate-500">
                    Belum masuk? Anda akan diarahkan ke halaman masuk terlebih dahulu sebelum
                    mengunggah berkas persyaratan.
                </p>
                <div class="mt-4 flex justify-start">
                    <a href="{{ route('login') }}" class="btn-secondary">Masuk ke SIMARDI</a>
                </div>
            </div>
        @endguest
    </div>
@endsection
