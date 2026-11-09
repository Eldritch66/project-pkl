<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntriSurat extends Model
{
    use HasFactory;

    protected $table = 'entri_surat';

    protected $fillable = [
        'no_urut',
        'nomor_surat',
        'dari',
        'wilayah_kota',
        'tanggal_terima',
        'tanggal_surat',
        'sifat_surat',
        'lampiran_jumlah',
        'lampiran_satuan',
        'halaman_jumlah',
        'halaman_satuan',
        'tingkat_perkembangan',
        'klasifikasi_kode',
        'klasifikasi_nama',
        'perihal',
        'ringkasan',
        'kelompok_surat',
        'kode_berkas',
        'nama_berkas',
        'diteruskan_kepada',
    ];

    protected $casts = [
        'tanggal_terima' => 'date',
        'tanggal_surat' => 'date',
    ];

    /**
     * Jenis surat untuk data yang diinput lewat Entri Surat.
     * Saat ini form entri hanya untuk surat masuk.
     */
    public function getJenisSuratAttribute(): string
    {
        return 'Surat Masuk';
    }
}
