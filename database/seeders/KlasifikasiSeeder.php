<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlasifikasiSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $data = [
            ['kode' => '000', 'nama' => 'Umum'],
            ['kode' => '020', 'nama' => 'Peralatan'],
            ['kode' => '030', 'nama' => 'Kekayaan Daerah'],
            ['kode' => '070', 'nama' => 'Penelitian'],
            ['kode' => '090', 'nama' => 'Perjalanan Dinas'],
            ['kode' => '100', 'nama' => 'Pemerintahan'],
            ['kode' => '110', 'nama' => 'Pemerintah Pusat'],
            ['kode' => '200', 'nama' => 'Politik'],
            ['kode' => '220', 'nama' => 'Org. Kemasyarakatan'],
            ['kode' => '260', 'nama' => 'Organisasi Wanita'],
            ['kode' => '270', 'nama' => 'Pemilihan Umum'],
            ['kode' => '280', 'nama' => 'Komisi Pemilihan Umum'],
            ['kode' => '300', 'nama' => 'Keamanan dan Ketertiban'],
            ['kode' => '310', 'nama' => 'Pertahanan'],
            ['kode' => '320', 'nama' => 'Kemiliteran'],
            ['kode' => '330', 'nama' => 'Keamanan'],
            ['kode' => '340', 'nama' => 'Perlindungan Masyarakat'],
            ['kode' => '350', 'nama' => 'Kejahatan'],
            ['kode' => '360', 'nama' => 'Bencana'],
            ['kode' => '370', 'nama' => 'Kecelakaan'],
            ['kode' => '400', 'nama' => 'KESEJAHTERAAN RAKYAT'],
            ['kode' => '410', 'nama' => 'Pendidikan'],
            ['kode' => '420', 'nama' => 'Kebudayaan'],
            ['kode' => '430', 'nama' => 'Kesehatan'],
            ['kode' => '440', 'nama' => 'Agama'],
            ['kode' => '450', 'nama' => 'Sosial'],
            ['kode' => '460', 'nama' => 'Kependudukan'],
            ['kode' => '470', 'nama' => 'Media Massa'],
            ['kode' => '500', 'nama' => 'PEREKONOMIAN'],
            ['kode' => '510', 'nama' => 'Perdagangan'],
            ['kode' => '520', 'nama' => 'Pertanian'],
            ['kode' => '530', 'nama' => 'Perindustrian'],
            ['kode' => '540', 'nama' => 'Pertambangan Kesamuderaan'],
            ['kode' => '550', 'nama' => 'Perhubungan'],
            ['kode' => '560', 'nama' => 'Tenaga Kerja'],
            ['kode' => '570', 'nama' => 'Permodalan'],
            ['kode' => '580', 'nama' => 'Perbankan/Moneter'],
            ['kode' => '590', 'nama' => 'Agraria'],
            ['kode' => '800', 'nama' => 'Kepegawaian'],
            ['kode' => '900', 'nama' => 'Keuangan'],
        ];

        $data = array_map(fn (array $row) => $row + [
            'created_at' => $now,
            'updated_at' => $now,
        ], $data);

        DB::table('klasifikasi')->upsert($data, ['kode'], ['nama', 'updated_at']);
    }
}
