<?php

namespace App\Http\Controllers;

use App\Models\SkUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $uploads = SkUpload::with('user')
            ->when($user->isPemohon(), fn ($query) => $query->where('user_id', $user->id))
            ->latest()
            ->get();

        return view('sk.index', [
            'uploads' => $uploads,
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'berkas' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ], [
            'berkas.required' => 'Pilih berkas yang akan diunggah.',
            'berkas.mimes' => 'Berkas harus berupa PDF, JPG, JPEG, atau PNG.',
            'berkas.max' => 'Ukuran berkas maksimal 2 MB.',
        ]);

        $file = $request->file('berkas');

        SkUpload::create([
            'user_id' => $request->user()->id,
            'nama_file' => $file->getClientOriginalName(),
            'path_file' => $file->store('sk', 'local'),
            'status' => 'diunggah',
        ]);

        return redirect()
            ->route('sk.index')
            ->with('success', 'Berkas berhasil diunggah.');
    }

    public function download(SkUpload $upload)
    {
        $user = auth()->user();

        if ($user->isPemohon() && $upload->user_id !== $user->id) {
            abort(403);
        }

        if (! Storage::disk('local')->exists($upload->path_file)) {
            abort(404, 'Berkas tidak ditemukan.');
        }

        return Storage::disk('local')->download($upload->path_file, $upload->nama_file);
    }
}
