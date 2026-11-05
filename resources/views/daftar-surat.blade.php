@extends('layouts.app')

@section('title', 'Daftar Surat')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Daftar Surat</h2>
            <div class="header-actions">
                <span class="badge-count">Jumlah Surat: {{ $surat->total() }}</span>
                <a href="{{ route('entri-surat') }}" class="link-lihat">Kembali ke Entri Surat</a>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $item)
                            <tr>
                                <td class="nowrap">
                                    <a href="{{ route('entri-surat', ['surat' => $item->id]) }}" class="table-action" title="Edit surat ini">{{ $item->no_urut }}</a>
                                </td>
                                <td class="nowrap">{{ $item->jenis_surat }}</td>
                                <td class="nowrap">{{ $item->tanggal_terima->locale('id')->translatedFormat('d M Y') }}</td>
                                <td>{{ $item->nomor_surat ?: '-' }}</td>
                                <td class="nowrap">
                                    <a href="{{ route('entri-surat', ['surat' => $item->id]) }}" class="table-action">Edit</a>
                                    <span class="action-sep">|</span>
                                    <a href="{{ route('entri-surat.cetak', $item) }}" class="table-action">Cetak</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($surat->hasPages())
                <div class="pagination">
                    @if (! $surat->onFirstPage())
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
