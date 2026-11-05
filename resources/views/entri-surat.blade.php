@extends('layouts.app')

@section('title', isset($surat) ? 'Edit Surat' : 'Entri Surat')

@section('content')
    @php
        $nilai = fn (string $field, $default = '') => old($field, $surat?->{$field} ?? $default);
        $tanggal = fn (string $field) => old($field, $surat?->{$field}?->format('Y-m-d'));
    @endphp

    <div class="card">
        <div class="card-header">
            <h2>{{ $surat ? 'Edit Identitas Surat' : 'Identitas Surat' }}</h2>
            <div class="header-actions">
                <span class="badge-count">Jumlah Surat: {{ $jumlahSurat }}</span>
                <a href="{{ route('daftar-surat') }}" class="link-lihat">Lihat Surat</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" id="form-entri-surat" action="{{ $surat ? route('entri-surat.update', $surat) : route('entri-surat.store') }}">
            @csrf
            @if ($surat)
                @method('PUT')
            @endif

            <div class="form-grid">
                <div class="form-group">
                    <label for="dari">Dari</label>
                    <input type="text" id="dari" name="dari" value="{{ $nilai('dari') }}" maxlength="255" required>
                    @error('dari')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="wilayah_kota">Wilayah / Kota</label>
                    <input type="text" id="wilayah_kota" name="wilayah_kota" value="{{ $nilai('wilayah_kota') }}" maxlength="100" required>
                    @error('wilayah_kota')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_urut">No. Urut Surat</label>
                    <input type="number" id="no_urut" value="{{ $nextNoUrut }}" readonly>
                    <span class="form-hint">{{ $surat ? 'Nomor urut surat yang sedang diedit.' : 'Otomatis bertambah dari surat sebelumnya.' }}</span>
                </div>

                <div class="form-group">
                    <label for="nomor_surat">No. Surat</label>
                    <input type="text" id="nomor_surat" name="nomor_surat" value="{{ $nilai('nomor_surat') }}" maxlength="100" placeholder="Contoh: 123/456/Bakesbangpol" required>
                    @error('nomor_surat')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_terima">Tanggal Terima</label>
                    <input type="date" id="tanggal_terima" name="tanggal_terima" value="{{ $tanggal('tanggal_terima') }}" required>
                    @error('tanggal_terima')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" id="tanggal_surat" name="tanggal_surat" value="{{ $tanggal('tanggal_surat') }}" required>
                    @error('tanggal_surat')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sifat_surat">Sifat Surat</label>
                    <select id="sifat_surat" name="sifat_surat" required>
                        <option value="">-- Pilih --</option>
                        <option value="biasa" @selected($nilai('sifat_surat') === 'biasa')>Biasa</option>
                        <option value="rahasia" @selected($nilai('sifat_surat') === 'rahasia')>Rahasia</option>
                    </select>
                    @error('sifat_surat')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Lampiran Surat</label>
                    <div class="input-row">
                        <input type="number" name="lampiran_jumlah" min="0" max="9999" value="{{ $nilai('lampiran_jumlah', 0) }}" required>
                        <select name="lampiran_satuan" required>
                            <option value="lembar" @selected($nilai('lampiran_satuan') === 'lembar')>Lembar</option>
                            <option value="berkas" @selected($nilai('lampiran_satuan') === 'berkas')>Berkas</option>
                            <option value="bundle" @selected($nilai('lampiran_satuan') === 'bundle')>Bundle</option>
                        </select>
                    </div>
                    @error('lampiran_jumlah')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                    @error('lampiran_satuan')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Halaman Surat</label>
                    <div class="input-row">
                        <input type="number" name="halaman_jumlah" min="0" max="9999" value="{{ $nilai('halaman_jumlah', 0) }}" required>
                        <select name="halaman_satuan" required>
                            <option value="lembar" @selected($nilai('halaman_satuan') === 'lembar')>Lembar</option>
                            <option value="berkas" @selected($nilai('halaman_satuan') === 'berkas')>Berkas</option>
                            <option value="bundle" @selected($nilai('halaman_satuan') === 'bundle')>Bundle</option>
                        </select>
                    </div>
                    @error('halaman_jumlah')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                    @error('halaman_satuan')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tingkat_perkembangan">Tingkat Perkembangan</label>
                    <select id="tingkat_perkembangan" name="tingkat_perkembangan" required>
                        <option value="">-- Pilih --</option>
                        <option value="asli" @selected($nilai('tingkat_perkembangan') === 'asli')>Asli</option>
                        <option value="umum" @selected($nilai('tingkat_perkembangan') === 'umum')>Umum</option>
                        <option value="salinan" @selected($nilai('tingkat_perkembangan') === 'salinan')>Salinan</option>
                    </select>
                    @error('tingkat_perkembangan')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Klasifikasi</label>
                    <div class="input-row">
                        <input type="text" class="kode" id="klasifikasi_kode" name="klasifikasi_kode" value="{{ $nilai('klasifikasi_kode') }}" inputmode="numeric" maxlength="4" placeholder="Kode" autocomplete="off" required>
                        <input type="text" id="klasifikasi_nama" name="klasifikasi_nama" value="{{ $nilai('klasifikasi_nama') }}" maxlength="255" placeholder="Nama klasifikasi" readonly>
                    </div>
                    <span class="form-hint" id="klasifikasi_info"></span>
                    @error('klasifikasi_kode')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="perihal">Perihal Surat</label>
                    <input type="text" id="perihal" name="perihal" value="{{ $nilai('perihal') }}" maxlength="255" required>
                    @error('perihal')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelompok_surat">Kelompok Surat</label>
                    <select id="kelompok_surat" name="kelompok_surat" required>
                        <option value="">-- Pilih --</option>
                        <option value="berita_acara" @selected($nilai('kelompok_surat') === 'berita_acara')>Berita Acara</option>
                        <option value="biasa" @selected($nilai('kelompok_surat') === 'biasa')>Biasa</option>
                        <option value="cuti" @selected($nilai('kelompok_surat') === 'cuti')>Cuti</option>
                        <option value="instruksi" @selected($nilai('kelompok_surat') === 'instruksi')>Instruksi</option>
                        <option value="naskah_perjanjian_hibah_daerah" @selected($nilai('kelompok_surat') === 'naskah_perjanjian_hibah_daerah')>Naskah Perjanjian Hibah Daerah</option>
                        <option value="proposal" @selected($nilai('kelompok_surat') === 'proposal')>Proposal</option>
                        <option value="surat_edaran" @selected($nilai('kelompok_surat') === 'surat_edaran')>Surat Edaran</option>
                    </select>
                    @error('kelompok_surat')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kode / Nama Berkas</label>
                    <div class="input-row">
                        <input type="text" class="kode" name="kode_berkas" value="{{ $nilai('kode_berkas') }}" inputmode="numeric" maxlength="4" placeholder="Kode" required>
                        <input type="text" name="nama_berkas" value="{{ $nilai('nama_berkas') }}" maxlength="255" placeholder="Nama berkas" required>
                    </div>
                    @error('kode_berkas')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                    @error('nama_berkas')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full">
                    <label for="ringkasan">Ringkasan</label>
                    <textarea id="ringkasan" name="ringkasan" rows="5" maxlength="255" required>{{ $nilai('ringkasan') }}</textarea>
                    @error('ringkasan')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">{{ $surat ? 'Simpan Perubahan' : 'Simpan' }}</button>
                <a href="{{ $surat ? route('daftar-surat') : route('entri-surat') }}" class="btn-secondary">Batal</a>
                @unless ($surat)
                    <button type="button" class="btn-danger" id="btn-hapus">Hapus</button>
                @endunless
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const daftarKlasifikasi = @json($klasifikasi);
            const petaKlasifikasi = {};

            daftarKlasifikasi.forEach(function (item) {
                petaKlasifikasi[item.kode] = item.nama;
            });

            const form = document.getElementById('form-entri-surat');
            const inputKode = document.getElementById('klasifikasi_kode');
            const inputNama = document.getElementById('klasifikasi_nama');
            const info = document.getElementById('klasifikasi_info');
            const tombolHapus = document.getElementById('btn-hapus');

            function isiNamaKlasifikasi() {
                const kode = inputKode.value.trim();

                if (kode === '') {
                    inputNama.value = '';
                    info.textContent = '';
                    return;
                }

                if (petaKlasifikasi[kode]) {
                    inputNama.value = petaKlasifikasi[kode];
                    info.textContent = '';
                } else {
                    inputNama.value = '';
                    info.textContent = 'Kode klasifikasi tidak ditemukan.';
                }
            }

            inputKode.addEventListener('input', isiNamaKlasifikasi);

            if (tombolHapus) {
                tombolHapus.addEventListener('click', function () {
                    form.querySelectorAll('input, select, textarea').forEach(function (el) {
                        if (el.type === 'hidden' || el.id === 'no_urut' || el.readOnly) {
                            return;
                        }

                        el.value = el.type === 'number' ? 0 : '';
                    });

                    inputKode.value = '';
                    inputNama.value = '';
                    info.textContent = '';
                    inputKode.focus();
                });
            }

            isiNamaKlasifikasi();
        });
    </script>
@endsection
