<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entri_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('no_urut')->unique();
            $table->string('dari');
            $table->string('wilayah_kota', 100);
            $table->date('tanggal_terima');
            $table->date('tanggal_surat');
            $table->string('sifat_surat', 20);
            $table->unsignedInteger('lampiran_jumlah')->default(0);
            $table->string('lampiran_satuan', 20);
            $table->unsignedInteger('halaman_jumlah')->default(0);
            $table->string('halaman_satuan', 20);
            $table->string('tingkat_perkembangan', 30);
            $table->string('klasifikasi_kode', 4);
            $table->string('klasifikasi_nama');
            $table->string('perihal');
            $table->string('kelompok_surat', 50);
            $table->string('kode_berkas', 4);
            $table->string('nama_berkas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entri_surat');
    }
};
