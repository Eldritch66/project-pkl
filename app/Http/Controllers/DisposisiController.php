<?php

namespace App\Http\Controllers;

use App\Models\EntriSurat;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class DisposisiController extends Controller
{
    public function index(Request $request)
    {
        $surat = $request->filled('surat')
            ? EntriSurat::findOrFail($request->integer('surat'))
            : null;

        $nextNoUrut = $surat?->no_urut ?? ((int) EntriSurat::max('no_urut') + 1);
        $jumlahSurat = EntriSurat::count();
        $klasifikasi = Klasifikasi::orderBy('kode')->get(['kode', 'nama']);

        return view('disposisi.form', [
            'surat' => $surat,
            'nextNoUrut' => $nextNoUrut,
            'jumlahSurat' => $jumlahSurat,
            'klasifikasi' => $klasifikasi,
        ]);
    }

    public function daftar()
    {
        $surat = EntriSurat::orderByDesc('no_urut')->paginate(15);

        return view('daftar-surat.index', [
            'surat' => $surat,
        ]);
    }

    public function cetak(EntriSurat $entriSurat)
    {
        return view('disposisi.cetak', [
            'surat' => $entriSurat,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), [
            'klasifikasi_kode.exists' => 'Kode klasifikasi tidak ditemukan.',
        ]);

        $data['klasifikasi_nama'] = Klasifikasi::where('kode', $data['klasifikasi_kode'])->value('nama');

        $surat = DB::transaction(function () use ($data) {
            $data['no_urut'] = (int) EntriSurat::max('no_urut') + 1;

            return EntriSurat::create($data);
        });

        return redirect()
            ->route('disposisi.cetak', $surat)
            ->with('success', 'Surat nomor urut '.$surat->no_urut.' berhasil disimpan.');
    }

    public function update(Request $request, EntriSurat $entriSurat)
    {
        $data = $request->validate($this->rules(), [
            'klasifikasi_kode.exists' => 'Kode klasifikasi tidak ditemukan.',
        ]);

        $data['klasifikasi_nama'] = Klasifikasi::where('kode', $data['klasifikasi_kode'])->value('nama');

        $entriSurat->update($data);

        return redirect()
            ->route('disposisi.index', ['surat' => $entriSurat->id])
            ->with('success', 'Surat nomor urut '.$entriSurat->no_urut.' berhasil diperbarui.');
    }

    private function rules(): array
    {
        return [
            'nomor_surat' => ['required', 'string', 'max:100'],
            'dari' => ['required', 'string', 'max:255'],
            'wilayah_kota' => ['required', 'string', 'max:100'],
            'tanggal_terima' => ['required', 'date'],
            'tanggal_surat' => ['required', 'date'],
            'sifat_surat' => ['required', 'in:biasa,rahasia'],
            'lampiran_jumlah' => ['required', 'integer', 'min:0', 'max:9999'],
            'lampiran_satuan' => ['required', 'in:lembar,berkas,bundle'],
            'halaman_jumlah' => ['required', 'integer', 'min:0', 'max:9999'],
            'halaman_satuan' => ['required', 'in:lembar,berkas,bundle'],
            'tingkat_perkembangan' => ['required', 'in:asli,umum,salinan'],
            'klasifikasi_kode' => ['required', 'digits_between:1,4', Rule::exists('klasifikasi', 'kode')],
            'perihal' => ['required', 'string', 'max:255'],
            'ringkasan' => ['required', 'string', 'max:255'],
            'kelompok_surat' => ['required', 'in:berita_acara,biasa,cuti,instruksi,naskah_perjanjian_hibah_daerah,proposal,surat_edaran'],
            'kode_berkas' => ['required', 'digits_between:1,4'],
            'nama_berkas' => ['required', 'string', 'max:255'],
            'diteruskan_kepada' => ['nullable', 'string', 'max:255'],
        ];
    }
}
