<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMARDI')</title>
    <style>
        :root {
            --primary: #0f4c81;
            --primary-dark: #0d3f6b;
            --background: #f4f6f9;
            --surface: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
            --danger: #b91c1c;
            --success: #047857;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        /* ---------- Header ---------- */

        header {
            background: var(--primary);
            color: #fff;
        }

        .container {
            width: min(1080px, 92%);
            margin: 0 auto;
        }

        .brand {
            padding: 18px 0 16px;
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

        main {
            padding: 28px 0 48px;
        }

        /* ---------- Tautan kembali ---------- */

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 16px;
            color: var(--primary);
            font-size: .88rem;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* ---------- Info akun di beranda ---------- */

        .account-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 12px 16px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .account-label {
            display: block;
            color: var(--muted);
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .account-bar strong {
            font-size: .9rem;
        }

        .btn-logout {
            flex: 0 0 auto;
            padding: 8px 16px;
            background: #fff;
            color: var(--primary);
            border: 1px solid var(--primary);
            border-radius: 8px;
            font: inherit;
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-logout:hover {
            background: #eef4fa;
        }

        /* ---------- Kartu & halaman beranda ---------- */

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 24px;
        }

        .page-stack {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .home-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(320px, .95fr);
            gap: 24px;
            align-items: start;
        }

        .profile-label {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            background: #e8f0f8;
            color: var(--primary);
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .about-card h2 {
            margin: 10px 0 14px;
            color: var(--primary);
            font-size: 1.45rem;
            line-height: 1.3;
        }

        .about-card p {
            margin: 0 0 14px;
            line-height: 1.7;
        }

        .about-list {
            margin: 0;
            padding-left: 20px;
            line-height: 1.7;
        }

        .about-list li {
            margin-bottom: 6px;
        }

        .about-app {
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
        }

        .about-app h3 {
            margin: 0 0 8px;
            color: var(--primary);
            font-size: 1rem;
        }

        .about-app p {
            margin: 0;
        }

        .menu-column {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .menu-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: inherit;
            text-decoration: none;
            transition: border-color .15s ease, box-shadow .15s ease, transform .15s ease;
        }

        .menu-card:hover {
            border-color: #b9cfe3;
            box-shadow: 0 8px 24px rgba(15, 76, 129, .08);
            transform: translateY(-1px);
        }

        .menu-number {
            display: flex;
            flex: 0 0 38px;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e8f0f8;
            color: var(--primary);
            font-weight: 700;
        }

        .menu-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            gap: 4px;
        }

        .menu-title {
            font-size: 1.02rem;
            font-weight: 700;
            color: #111827;
        }

        .menu-desc {
            color: var(--muted);
            font-size: .88rem;
            line-height: 1.5;
        }

        .menu-badge {
            align-self: flex-start;
            margin-top: 4px;
            padding: 2px 9px;
            border-radius: 999px;
            background: #e8f0f8;
            color: var(--primary);
            font-size: .72rem;
            font-weight: 700;
        }

        .menu-arrow {
            align-self: center;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .menu-card.is-locked {
            background: #f9fafb;
            cursor: not-allowed;
        }

        .menu-card.is-locked .menu-number {
            background: #e5e7eb;
            color: #9ca3af;
        }

        .menu-card.is-locked .menu-title {
            color: var(--muted);
        }

        .menu-locked-note {
            margin-top: 2px;
            color: #9ca3af;
            font-size: .78rem;
        }

        /* ---------- Login ---------- */

        .login-page {
            display: flex;
            justify-content: center;
            padding: 24px 0;
        }

        .login-card {
            width: min(420px, 100%);
        }

        .login-subtitle {
            margin: 0 0 22px;
            color: var(--muted);
            font-size: .9rem;
        }

        .login-card .form-group {
            margin-bottom: 16px;
        }

        .login-card .btn-primary {
            width: 100%;
        }

        .login-back {
            margin: 18px 0 0;
            text-align: center;
            font-size: .86rem;
        }

        .login-back a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .login-back a:hover {
            text-decoration: underline;
        }

        /* ---------- Form ---------- */

        h2 {
            margin-top: 0;
            color: var(--primary);
        }

        p {
            line-height: 1.65;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px 22px;
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
            color: var(--text);
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
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(15, 76, 129, .15);
        }

        .form-group input[readonly] {
            background: #f3f4f6;
            color: var(--muted);
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
            color: var(--muted);
            font-size: .78rem;
        }

        .form-error {
            color: var(--danger);
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

        .card-subtitle {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: .88rem;
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
            color: var(--primary);
            font-size: .85rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .link-lihat {
            color: var(--primary);
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
        }

        .link-lihat:hover {
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
            background: var(--primary);
            color: #fff;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: #fff;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-secondary:hover {
            background: #eef4fa;
        }

        .btn-danger {
            background: #fff;
            color: var(--danger);
            border: 1px solid #fca5a5;
        }

        .btn-danger:hover {
            background: #fef2f2;
        }

        /* ---------- Tabel ---------- */

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
            border-bottom: 1px solid var(--border);
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
            color: var(--primary);
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
            color: var(--muted);
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
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .pagination a:hover {
            text-decoration: underline;
        }

        /* ---------- Notifikasi & status ---------- */

        .alert-success,
        .alert-error {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: .9rem;
        }

        .alert-success {
            border: 1px solid #a7f3d0;
            background: #ecfdf5;
            color: var(--success);
        }

        .alert-error {
            border: 1px solid #fecaca;
            background: #fef2f2;
            color: var(--danger);
        }

        .status-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            background: #e8f0f8;
            color: var(--primary);
            font-size: .78rem;
            font-weight: 600;
            text-transform: capitalize;
        }

        /* ---------- Upload SK ---------- */

        .upload-form {
            max-width: 560px;
        }

        .upload-form input[type="file"] {
            padding: 9px 12px;
            background: #f9fafb;
        }

        .upload-form .form-actions {
            justify-content: flex-start;
        }

        /* ---------- Responsif ---------- */

        @media (max-width: 860px) {
            .home-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 720px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .header-actions {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="brand">
                <h1>SIMARDI</h1>
                <p>Sistem Informasi Manajemen Arsip dan Disposisi &middot; Bakesbangpol Kota Bogor</p>
            </div>
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
</body>

</html>
