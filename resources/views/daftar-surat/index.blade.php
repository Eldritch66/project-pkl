@extends('layouts.app')

@section('title', 'Daftar Surat — SIMARDI')

@section('content')
    <a href="{{ route('home') }}" class="back-link">&larr; Kembali ke Beranda</a>

    <div class="card">
        <div class="card-header">
            <div>
                <h2>Daftar Surat</h2>
                <p class="card-subtitle">Seluruh surat masuk yang tercatat di SIMARDI.</p>
            </div>
            <div class="header-actions">
                <span class="badge-count">Jumlah Surat: {{ $surat->total() }}</span>
                <a href="{{ route('disposisi.index') }}" class="link-lihat">Kembali ke Disposisi</a>
            </div>
        </div>

        @if ($surat->isEmpty())
            <div class="empty-state">Belum ada surat yang dibuat.</div>
        @else
            <div class="table-wrap">
                <table class="data">
                    <thead>
                        <tr>
                            <th>No. Urut</th>
                            <th>Jenis Surat</th>
                            <th>Tgl Terima</th>
                            <th>No Surat</th>
                            <th>Diteruskan Kepada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $item)
                            <tr>
                                <td class="nowrap">
                                    <a href="{{ route('disposisi.index', ['surat' => $item->id]) }}" class="table-action"
                                        title="Edit surat ini">{{ $item->no_urut }}</a>
                                </td>
                                <td class="nowrap">{{ $item->jenis_surat }}</td>
                                <td class="nowrap">{{ $item->tanggal_terima->locale('id')->translatedFormat('d M Y') }}</td>
                                <td>{{ $item->nomor_surat ?: '-' }}</td>
                                <td>{{ $item->diteruskan_kepada ?: '-' }}</td>
                                <td class="nowrap">
                                    <a href="{{ route('disposisi.index', ['surat' => $item->id]) }}"
                                        class="table-action">Edit</a>
                                    <span class="action-sep">|</span>
                                    <a href="{{ route('disposisi.cetak', $item) }}"
                                        class="table-action">Cetak</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($surat->hasPages())
                <div class="pagination">
                    @if (!$surat->onFirstPage())
                        <a href="{{ $surat->previousPageUrl() }}">&laquo; Sebelumnya</a>
                    @endif

                    <span>Halaman {{ $surat->currentPage() }} dari {{ $surat->lastPage() }}</span>

                    @if ($surat->hasMorePages())
                        <a href="{{ $surat->nextPageUrl() }}">Berikutnya &raquo;</a>
                    @endif
                </div>
            @endif
        @endif
    </div>
@endsection
