@extends('layouts.app')

@section('title', 'Masuk — SIMARDI')

@section('content')
    <div class="login-page">
        <div class="card login-card">
            <span class="profile-label">SIMARDI</span>
            <h2>Masuk ke SIMARDI</h2>
            <p class="login-subtitle">Sistem Informasi Manajemen Arsip dan Disposisi</p>

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf

                <div class="form-group">
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

                <div class="form-group">
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

                <button type="submit" class="btn-primary">Masuk</button>
            </form>

            <p class="login-back">
                <a href="{{ route('home') }}">Kembali ke beranda</a>
            </p>
        </div>
    </div>
@endsection
