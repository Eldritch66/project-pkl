@extends('layouts.app')

@section('title', 'Masuk — SIMARDI')

@section('content')
    <div class="flex justify-center py-6">
        <div class="w-full max-w-[420px] rounded-xl border border-slate-200 bg-white p-6">
            <span class="inline-block rounded-full bg-primary-light px-3 py-1 text-xs font-bold uppercase tracking-wider text-primary">
                SIMARDI
            </span>
            <h2 class="mb-0 mt-2.5">Masuk ke SIMARDI</h2>
            <p class="mb-5 mt-1 text-sm text-slate-500">Sistem Informasi Manajemen Arsip dan Disposisi</p>

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf

                <div class="form-group mb-4">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        required
                        autofocus
                    >
                    @error('username')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        required
                    >
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-primary w-full">Masuk</button>
            </form>

            <p class="mb-0 mt-4 text-center text-sm">
                <a href="{{ route('home') }}" class="font-semibold text-primary no-underline hover:underline">
                    Kembali ke beranda
                </a>
            </p>
        </div>
    </div>
@endsection
