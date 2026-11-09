@extends('layouts.app')

@section('title', 'Surat SK — SIMARDI')

@section('content')
    <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke Beranda</a>

    @php
        $petugas = auth()->user()->isPetugas();
    @endphp

    <div class="page-stack">
        @unless ($petugas)
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2>Surat SK</h2>
                        <p class="card-subtitle">
                            Unggah berkas persyaratan surat keterangan. Berkas yang diunggah akan diproses oleh petugas.
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('sk.upload') }}" enctype="multipart/form-data" class="upload-form">
                    @csrf

                    <div class="form-group">
                        <label for="berkas">Berkas Persyaratan</label>
                        <input
                            type="file"
                            id="berkas"
                            name="berkas"
                            accept=".pdf,.jpg,.jpeg,.png"
                            required
                        >
                        <span class="form-hint">Format PDF, JPG, JPEG, atau PNG. Ukuran maksimal 2 MB.</span>
                        @error('berkas')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary">Unggah Berkas</button>
                    </div>
                </form>
            </div>
        @else
            <div class="card">
                <h2>Surat SK</h2>
                <p class="card-subtitle">
                    Halaman ini menampilkan berkas surat keterangan yang diunggah oleh pemohon.
                    Unggahan hanya dapat dilakukan melalui akun pemohon.
                </p>
            </div>
        @endunless

        <div class="card">
            <div class="card-header">
                <div>
                    <h2>Berkas Terunggah</h2>
                    <p class="card-subtitle">
                        {{ $petugas ? 'Seluruh berkas yang diunggah oleh pemohon.' : 'Berkas yang telah Anda unggah.' }}
                    </p>
                </div>
                <span class="badge-count">Total: {{ $uploads->count() }}</span>
            </div>

            @if ($uploads->isEmpty())
                <div class="empty-state">Belum ada berkas yang diunggah.</div>
            @else
                <div class="table-wrap">
                    <table class="data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Berkas</th>
                                @if ($petugas)
                                    <th>Diunggah Oleh</th>
                                @endif
                                <th>Tanggal Unggah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uploads as $upload)
                                <tr>
                                    <td class="nowrap">{{ $loop->iteration }}</td>
                                    <td>{{ $upload->nama_file }}</td>
                                    @if ($petugas)
                                        <td class="nowrap">{{ $upload->user->name }}</td>
                                    @endif
                                    <td class="nowrap">{{ $upload->created_at->locale('id')->translatedFormat('d M Y H:i') }}</td>
                                    <td class="nowrap">
                                        <span class="status-badge">{{ $upload->status }}</span>
                                    </td>
                                    <td class="nowrap">
                                        <a href="{{ route('sk.download', $upload) }}" class="table-action">Unduh</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
