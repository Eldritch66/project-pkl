<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jaringan Informasi Kearsipan Daerah')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        header {
            background: #0f4c81;
            color: #fff;
        }

        .container {
            width: min(1080px, 92%);
            margin: 0 auto;
        }

        .brand {
            padding: 18px 0 10px;
        }

        .brand h1 {
            margin: 0;
            font-size: 1.35rem;
            letter-spacing: .3px;
        }

        .brand p {
            margin: 4px 0 0;
            font-size: .85rem;
            opacity: .85;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 6px;
            padding-bottom: 12px;
        }

        nav a {
            color: #dbeafe;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px 6px 0 0;
            font-size: .92rem;
        }

        nav a:hover {
            background: rgba(255, 255, 255, .12);
            color: #fff;
        }

        nav a.active {
            background: #f4f6f9;
            color: #0f4c81;
            font-weight: 600;
        }

        nav form {
            margin-left: auto;
        }

        nav button {
            background: none;
            border: 1px solid rgba(255, 255, 255, .4);
            color: #dbeafe;
            font: inherit;
            font-size: .85rem;
            padding: 7px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        nav button:hover {
            background: rgba(255, 255, 255, .12);
            color: #fff;
        }

        main {
            padding: 28px 0 48px;
        }

        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 24px;
        }

        .page-stack {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .profile-hero h2 {
            margin: 6px 0 12px;
            font-size: 1.5rem;
            line-height: 1.3;
        }

        .profile-hero p {
            max-width: 780px;
            margin: 0;
        }

        .profile-label {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            background: #e8f0f8;
            color: #0f4c81;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .home-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .card h3 {
            margin: 0 0 12px;
            color: #0f4c81;
            font-size: 1.05rem;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .profile-list {
            margin: 0;
            padding-left: 20px;
            line-height: 1.7;
        }

        .profile-list li {
            margin-bottom: 6px;
        }

        @media (max-width: 720px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
        }

        h2 {
            margin-top: 0;
            color: #0f4c81;
        }

        p {
            line-height: 1.65;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px 22px;
        }

        @media (max-width: 720px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: .88rem;
            font-weight: 600;
            color: #374151;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: .95rem;
            background: #fff;
            color: #1f2937;
        }

        .form-group textarea {
            min-height: 160px;
            padding: 10px 12px;
            font-family: inherit;
            line-height: 1.5;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #0f4c81;
            box-shadow: 0 0 0 3px rgba(15, 76, 129, .15);
        }

        .form-group input[readonly] {
            background: #f3f4f6;
            color: #6b7280;
        }

        .input-row {
            display: flex;
            gap: 10px;
        }

        .input-row input[type="number"],
        .input-row input.kode {
            flex: 0 0 120px;
        }

        .input-row input[type="text"],
        .input-row select {
            flex: 1;
        }

        .form-hint {
            color: #6b7280;
            font-size: .78rem;
        }

        .form-error {
            color: #b91c1c;
            font-size: .8rem;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .card-header h2 {
            margin: 0;
        }

        .header-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
        }

        .badge-count {
            padding: 6px 14px;
            border: 1px solid #c7d9ea;
            border-radius: 999px;
            background: #e8f0f8;
            color: #0f4c81;
            font-size: .85rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .link-lihat {
            color: #0f4c81;
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
        }

        .link-lihat:hover {
            text-decoration: underline;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            font-size: .9rem;
        }

        table.data th,
        table.data td {
            padding: 10px 12px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid #e5e7eb;
        }

        table.data th {
            background: #f1f5f9;
            color: #374151;
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .03em;
            white-space: nowrap;
        }

        table.data tbody tr:hover td {
            background: #f8fafc;
        }

        table.data td.nowrap {
            white-space: nowrap;
        }

        .table-action {
            color: #0f4c81;
            font-weight: 600;
            text-decoration: none;
        }

        .table-action:hover {
            text-decoration: underline;
        }

        .action-sep {
            color: #9ca3af;
            margin: 0 6px;
        }

        .empty-state {
            padding: 30px;
            text-align: center;
            color: #6b7280;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 16px;
            font-size: .85rem;
        }

        .pagination a {
            color: #0f4c81;
            font-weight: 600;
            text-decoration: none;
        }

        .pagination a:hover {
            text-decoration: underline;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }

        .btn-primary,
        .btn-secondary,
        .btn-danger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            padding: 11px 22px;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: #0f4c81;
            color: #fff;
            border: 1px solid #0f4c81;
        }

        .btn-primary:hover {
            background: #0d3f6b;
        }

        .btn-secondary {
            background: #fff;
            color: #0f4c81;
            border: 1px solid #0f4c81;
        }

        .btn-secondary:hover {
            background: #eef4fa;
        }

        .btn-danger {
            background: #fff;
            color: #b91c1c;
            border: 1px solid #fca5a5;
        }

        .btn-danger:hover {
            background: #fef2f2;
        }

        .alert-success {
            margin-bottom: 18px;
            padding: 12px 14px;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            background: #ecfdf5;
            color: #047857;
            font-size: .9rem;
        }

        /* Konten dikunci sebelum login */
        body.locked header,
        body.locked main {
            filter: blur(6px);
            pointer-events: none;
            user-select: none;
        }

        .login-overlay {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(15, 23, 42, .35);
        }

        .login-card {
            width: min(380px, 100%);
            background: #fff;
            border-radius: 14px;
            padding: 28px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, .25);
        }

        .login-card h2 {
            margin: 0 0 4px;
        }

        .login-subtitle {
            margin: 0 0 20px;
            font-size: .85rem;
            color: #6b7280;
        }

        .login-card label {
            display: block;
            margin-bottom: 6px;
            font-size: .85rem;
            font-weight: 600;
        }

        .login-card input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: .95rem;
        }

        .login-card input:focus {
            outline: none;
            border-color: #0f4c81;
            box-shadow: 0 0 0 3px rgba(15, 76, 129, .15);
        }

        .login-card button[type="submit"] {
            width: 100%;
            margin-top: 16px;
            padding: 11px;
            background: #0f4c81;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
        }

        .login-card button[type="submit"]:hover {
            background: #0d3f6b;
        }

        .login-error {
            margin: 10px 0 0;
            color: #b91c1c;
            font-size: .85rem;
        }
    </style>
</head>

<body class="{{ session('gate_authenticated') ? '' : 'locked' }}">
    <header>
        <div class="container">
            <div class="brand">
                <h1>Jaringan Informasi Kearsipan Daerah</h1>
                <p>Badan Kesatuan Bangsa dan Politik Kota Bogor</p>
            </div>

            <nav>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('entri-surat') }}" class="{{ request()->routeIs('entri-surat', 'entri-surat.store', 'entri-surat.cetak') ? 'active' : '' }}">Entri Surat</a>
                <a href="{{ route('daftar-surat') }}" class="{{ request()->routeIs('daftar-surat') ? 'active' : '' }}">Daftar Surat</a>

                @if (session('gate_authenticated'))
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Keluar</button>
                    </form>
                @endif
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    @unless (session('gate_authenticated'))
        @include('auth.login-overlay')
    @endunless
</body>

</html>
