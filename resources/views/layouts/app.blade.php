<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMARDI')</title>
    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body>
    <header class="bg-primary text-white">
        <div class="container header-inner">
            <a href="{{ route('home') }}" class="brand">
                <h1>Bakesbangpol Kota Bogor</h1>
                <p>SIMARDI &middot; Sistem Informasi Manajemen Arsip dan Disposisi</p>
            </a>

            <nav class="site-nav" aria-label="Navigasi utama">
                <a href="{{ route('home') }}"
                    class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">Beranda</a>
                <a href="{{ route('buat-surat') }}"
                    class="nav-link {{ request()->routeIs('buat-surat') ? 'is-active' : '' }}">Buat Surat</a>

                @auth
                    @if (auth()->user()->isPetugas())
                        <a href="{{ route('daftar-surat') }}"
                            class="nav-link {{ request()->routeIs('daftar-surat') ? 'is-active' : '' }}">Daftar Surat</a>
                        <a href="{{ route('disposisi.index') }}"
                            class="nav-link {{ request()->routeIs('disposisi.*') ? 'is-active' : '' }}">Disposisi</a>
                    @else
                        <a href="{{ route('sk.index') }}"
                            class="nav-link {{ request()->routeIs('sk.*') ? 'is-active' : '' }}">Berkas Saya</a>
                    @endif
                @endauth

                <span class="nav-sep" aria-hidden="true"></span>

                @auth
                    <span class="nav-user" title="{{ auth()->user()->name }}">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="nav-logout">
                        @csrf
                        <button type="submit" class="nav-btn">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-btn">Masuk</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Badan Kesatuan Bangsa dan Politik Kota Bogor</p>
            <p>SIMARDI &middot; Sistem Informasi Manajemen Arsip dan Disposisi</p>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
