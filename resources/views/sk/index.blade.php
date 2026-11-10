@extends('layouts.app')

@section('title', 'Surat SK — SIMARDI')

@section('content')
    <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke Beranda</a>

    @php
        $petugas = auth()->user()->isPetugas();
    @endphp

    <div class="flex flex-col gap-[18px]">
        @unless ($petugas)
            <section class="rounded-xl border border-slate-200 bg-white p-6">
                <div class="mb-[18px] flex flex-col gap-1">
                    <h2 class="m-0">Surat SK</h2>
                    <p class="m-0 text-sm leading-relaxed text-slate-500">
                        Unggah berkas persyaratan surat keterangan. Berkas yang diunggah akan diproses oleh petugas.
                    </p>
                </div>

                <form method="POST" action="{{ route('sk.upload') }}" enctype="multipart/form-data" class="max-w-[560px]">
                    @csrf

                    <div class="flex flex-col gap-1.5">
                        <label for="berkas" class="text-sm font-semibold text-slate-700">Berkas Persyaratan</label>
                        <input
                            type="file"
                            id="berkas"
                            name="berkas"
                            accept=".pdf,.jpg,.jpeg,.png"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-slate-50 px-3 py-2 text-sm file:mr-3 file:rounded-md file:border-0 file:bg-primary file:px-3 file:py-1.5 file:text-sm file:font-semibold file:text-white hover:file:bg-primary-dark"
                        >
                        <span class="text-xs text-slate-500">Format PDF, JPG, JPEG, atau PNG. Ukuran maksimal 2 MB.</span>
                        @error('berkas')
                            <span class="text-xs text-red-700">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-start">
                        <button type="submit" class="btn-primary">Unggah Berkas</button>
                    </div>
                </form>
            </section>
        @else
            <section class="rounded-xl border border-slate-200 bg-white p-6">
                <h2 class="m-0">Surat SK</h2>
                <p class="mb-0 mt-1 text-sm leading-relaxed text-slate-500">
                    Halaman ini menampilkan berkas surat keterangan yang diunggah oleh pemohon.
                    Unggahan hanya dapat dilakukan melalui akun pemohon.
                </p>
            </section>
        @endunless

        <section class="rounded-xl border border-slate-200 bg-white p-6">
            <div class="mb-[18px] flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                <div>
                    <h2 class="m-0">Berkas Terunggah</h2>
                    <p class="mb-0 mt-1 text-sm text-slate-500">
                        {{ $petugas ? 'Seluruh berkas yang diunggah oleh pemohon.' : 'Berkas yang telah Anda unggah.' }}
                    </p>
                </div>
                <span class="badge-count">Total: {{ $uploads->count() }}</span>
            </div>

            @if ($uploads->isEmpty())
                <div class="p-8 text-center text-slate-500">Belum ada berkas yang diunggah.</div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap border-b border-slate-200 bg-slate-100 px-3 py-2.5 text-left text-xs uppercase tracking-wide text-slate-700">No</th>
                                <th class="whitespace-nowrap border-b border-slate-200 bg-slate-100 px-3 py-2.5 text-left text-xs uppercase tracking-wide text-slate-700">Nama Berkas</th>
                                @if ($petugas)
                                    <th class="whitespace-nowrap border-b border-slate-200 bg-slate-100 px-3 py-2.5 text-left text-xs uppercase tracking-wide text-slate-700">Diunggah Oleh</th>
                                @endif
                                <th class="whitespace-nowrap border-b border-slate-200 bg-slate-100 px-3 py-2.5 text-left text-xs uppercase tracking-wide text-slate-700">Tanggal Unggah</th>
                                <th class="whitespace-nowrap border-b border-slate-200 bg-slate-100 px-3 py-2.5 text-left text-xs uppercase tracking-wide text-slate-700">Status</th>
                                <th class="whitespace-nowrap border-b border-slate-200 bg-slate-100 px-3 py-2.5 text-left text-xs uppercase tracking-wide text-slate-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uploads as $upload)
                                <tr class="hover:bg-slate-50">
                                    <td class="whitespace-nowrap border-b border-slate-200 px-3 py-2.5 align-top">{{ $loop->iteration }}</td>
                                    <td class="border-b border-slate-200 px-3 py-2.5 align-top">{{ $upload->nama_file }}</td>
                                    @if ($petugas)
                                        <td class="whitespace-nowrap border-b border-slate-200 px-3 py-2.5 align-top">{{ $upload->user->name }}</td>
                                    @endif
                                    <td class="whitespace-nowrap border-b border-slate-200 px-3 py-2.5 align-top">{{ $upload->created_at->locale('id')->translatedFormat('d M Y H:i') }}</td>
                                    <td class="whitespace-nowrap border-b border-slate-200 px-3 py-2.5 align-top">
                                        <span class="status-badge">{{ $upload->status }}</span>
                                    </td>
                                    <td class="whitespace-nowrap border-b border-slate-200 px-3 py-2.5 align-top">
                                        <a href="{{ route('sk.download', $upload) }}" class="table-action">Unduh</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
@endsection
