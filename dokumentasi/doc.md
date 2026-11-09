# Dokumentasi Pengembangan — Jaringan Informasi Kearsipan Daerah

**Proyek:** `project-pkl`
**Instansi:** Badan Kesatuan Bangsa dan Politik (Bakesbangpol) Kota Bogor
**Disusun:** 4 November 2026
**Framework:** Laravel 11.57.1 · PHP 8.3 · MySQL 8.0 (Laragon)

---

## 1. Latar Belakang

Dokumen ini merangkum seluruh percakapan dan pekerjaan teknis yang dilakukan
pada aplikasi **Jaringan Informasi Kearsipan Daerah (JIKD)**, mulai dari
pertanyaan awal tentang pembuatan database hingga pembangunan form Entri Surat,
master data klasifikasi, daftar surat, dan halaman siap cetak.

Aplikasi ini merupakan bagian dari inovasi **"Bogor Harmoni"** yang dijelaskan
dalam proposal:

```
tujuan-project/(Proposal) Rancang Bangun Inovasi Pelayanan Bakesbangpol Kota Bogor.docx
```

Ringkasan proposal: transformasi layanan Bakesbangpol Kota Bogor dari manual
menjadi elektronik, dengan 7 jenis layanan (permohonan penelitian, surat
keterangan terdaftar, laporan kegiatan ormas/parpol, rekomendasi, dan laporan
KPWK). Tech stack yang direncanakan: PHP/Laravel, MySQL, server Linux, domain
`*.bogorkota.go.id` + SSL.

---

## 2. Kronologi Percakapan

| No | Permintaan / Pertanyaan | Tindakan / Jawaban | Status |
|----|--------------------------|--------------------|--------|
| 1 | Cara membuat database langsung dari Laravel | Dijelaskan bahwa Laravel 11 tidak punya `db:create`; disediakan 3 cara: MySQL via Laragon, `DB::statement` lewat tinker/route, dan SQLite. Ditemukan `.env` bermasalah (`DB_CONNECTION` dikomentari, `DB_DATABASE=laravel`) | Selesai |
| 2 | Membaca proposal di folder `tujuan-project` | Proposal `.docx` diekstrak dan diringkas: profil Bakesbangpol, 7 layanan, masalah, tujuan, tahapan inovasi, tech stack | Selesai |
| 3 | Membuat halaman Jaringan Informasi Kearsipan Daerah + navigasi Entri Surat | Dibuat route, layout, dan dua view. URL dipilih `/jaringan-informasi-kearsipan-daerah` dan `/entri-surat` | Selesai |
| 4 | Root URL masih "Welcome to Laravel" | Root `/` diubah menampilkan halaman JIKD (Opsi A) | Selesai |
| 5 | Navigasi cukup Entri Surat | Menu Beranda dan JIKD dihapus dari navigasi | Selesai |
| 6 | Login sebelum masuk website, password `admin123`, background diblur | Dibuat login overlay di root + middleware password gate + efek blur. Login berhasil menampilkan halaman Entri Surat | Selesai |
| 7 | Membuat tabel `entri surat` dan mengeksekusi kode | Dibuat tabel `entri_surat`, model, controller, route POST, dan form Identitas Surat lengkap | Selesai |
| 8 | Menambah field Ringkasan (input text) | Ditambah kolom `ringkasan` + input teks + validasi | Selesai |
| 9 | Ringkasan dipindah ke paling bawah | Field Ringkasan dipindah setelah Kode/Nama Berkas | Selesai |
| 10 | Ringkasan dibuat memanjang ke bawah (textarea) | Input diubah menjadi `textarea`, lebar penuh, tinggi minimal 160px | Selesai |
| 11 | Teks textarea terlalu ke bawah karena padding | Padding dikembalikan `10px 12px` agar teks mepet ke border atas | Selesai |
| 12 | Relasi Klasifikasi: kode → nama otomatis | Dijelaskan opsi master data di database + autofill JS + validasi server | Selesai |
| 13 | Menyediakan data klasifikasi | Data `dokumentasi/klasifikasi.txt` (41 baris) diimpor menjadi 40 kode unik; duplikat `300` diambil "Keamanan dan Ketertiban"; typo "Kepegawaiaan" diperbaiki | Selesai |
| 14 | Jumlah surat, tombol Simpan/Batal/Hapus | Badge jumlah surat di kanan atas, tombol Simpan/Batal/Hapus; Hapus mengosongkan form tanpa menyentuh database | Selesai |
| 15 | Halaman siap cetak setelah simpan | Setelah simpan diarahkan ke `/entri-surat/{id}/cetak` dengan layout Lembar Disposisi A4 | Selesai |
| 16 | Lihat Surat + daftar surat | Link "Lihat Surat" di bawah badge, halaman `/daftar-surat` dengan tabel dan pagination | Selesai |
| 17 | Kelompok surat disesuaikan | Opsi menjadi Berita Acara, Biasa, Cuti, Instruksi, Naskah Perjanjian Hibah Daerah, Proposal, Surat Edaran | Selesai |
| 18 | Data klasifikasi tidak sengaja terhapus | `KlasifikasiSeeder` dijalankan ulang (upsert) hingga 40 kode kembali | Selesai |
| 19 | Page daftar surat dengan No Urut, Jenis Surat, Tgl Terima, No Surat | Kolom daftar surat diganti; field `nomor_surat` dan jenis surat "Surat Masuk" ditambahkan | Selesai |
| 20 | Root page berisi profil Bakesbangpol + menu Daftar Surat di navigasi | Root `/` menjadi halaman profil instansi; navigasi atas berisi Beranda, Entri Surat, Daftar Surat | Selesai |
| 21 | Klik surat di daftar untuk langsung masuk Entri Surat | No. Urut di daftar menjadi link edit; form terisi otomatis dan tombol berubah menjadi "Simpan Perubahan" | Selesai |
| 22 | Fitur mencatat instruksi lisan "diberikan ke Pak ..." | Ditambah field Diteruskan Kepada; tampil di daftar dan lembar cetak | Selesai |

---

## 3. Konfigurasi Database

Database menggunakan **MySQL** dari Laragon.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simardi
DB_USERNAME=root
DB_PASSWORD=
```

Perubahan penting: `DB_CONNECTION` sebelumnya dikomentari sehingga Laravel
memakai SQLite dan gagal karena `DB_DATABASE=simardi` dianggap path file.
Setelah diset `mysql`, migration dijalankan dan tabel aplikasi terbentuk.

Tabel yang ada di database `simardi`:

- `users`
- `password_reset_tokens`
- `sessions`
- `cache`, `cache_locks`
- `jobs`, `job_batches`, `failed_jobs`
- `migrations`
- `entri_surat`
- `klasifikasi`

---

## 4. Route Aplikasi

| Method | URL | Name | Handler | Akses |
|--------|-----|------|---------|-------|
| GET | `/` | `home` | View `beranda` | Publik (tampil blur + login) |
| GET | `/entri-surat` | `entri-surat` | `EntriSuratController@index` | Wajib login |
| POST | `/entri-surat` | `entri-surat.store` | `EntriSuratController@store` | Wajib login |
| PUT | `/entri-surat/{entriSurat}` | `entri-surat.update` | `EntriSuratController@update` | Wajib login |
| GET | `/entri-surat/{entriSurat}/cetak` | `entri-surat.cetak` | `EntriSuratController@cetak` | Wajib login |
| GET | `/daftar-surat` | `daftar-surat` | `EntriSuratController@daftar` | Wajib login |
| GET | `/jaringan-informasi-kearsipan-daerah` | `jikd` | View `jaringan-informasi-kearsipan-daerah` | Wajib login |
| POST | `/login` | `login.attempt` | `Auth\LoginController@login` | Publik (throttle 5/menit) |
| POST | `/logout` | `logout` | `Auth\LoginController@logout` | Publik |

---

## 5. Mekanisme Login (Password Gate)

Login **bukan halaman terpisah**, melainkan overlay di halaman root.

**Alur:**
1. Buka `/` → halaman profil Bakesbangpol tampil blur, form login muncul di tengah.
2. Isi password `admin123` → session `gate_authenticated` diset.
3. Halaman reload → blur hilang, tombol **Keluar** muncul.
4. Password salah → pesan "Password salah", tetap blur.
5. Akses `/entri-surat` atau halaman JIKD tanpa login → redirect ke `/`.

**Komponen:**

| File | Fungsi |
|------|--------|
| `app/Http/Controllers/Auth/LoginController.php` | Proses login & logout |
| `app/Http/Middleware/EnsurePasswordGate.php` | Redirect ke `/` jika belum login |
| `resources/views/auth/login-overlay.blade.php` | Form login overlay |
| `bootstrap/app.php` | Alias middleware `password.gate` |

**Keamanan:**
- Password disimpan di `.env` (`SITE_PASSWORD=admin123`), dibaca lewat `config('app.site_password')`.
- Perbandingan memakai `hash_equals()`.
- Session di-regenerate setelah login; di-invalidate saat logout.
- Rate limit login: 5 percobaan per menit.

**Efek blur (CSS di layout):**
```css
body.locked header,
body.locked main {
    filter: blur(6px);
    pointer-events: none;
    user-select: none;
}
```

---

## 6. Tabel `entri_surat`

Dibuat lewat beberapa migration:

- `2026_11_04_000001_create_entri_surat_table.php`
- `2026_11_04_000002_add_ringkasan_to_entri_surat_table.php`
- `2026_11_04_000004_expand_kelompok_surat_on_entri_surat_table.php`
- `2026_11_04_000005_add_nomor_surat_to_entri_surat_table.php`
- `2026_11_04_000006_add_disposisi_to_entri_surat_table.php`
- `2026_11_04_000007_remove_extra_disposisi_columns_from_entri_surat_table.php`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | bigint unsigned, PK | |
| `no_urut` | int unsigned, unique | Otomatis `max(no_urut) + 1` |
| `nomor_surat` | varchar(100), nullable | Nomor surat asli dari pengirim |
| `dari` | varchar(255) | Pengirim surat |
| `wilayah_kota` | varchar(100) | |
| `tanggal_terima` | date | |
| `tanggal_surat` | date | |
| `sifat_surat` | varchar(20) | `biasa`, `rahasia` |
| `lampiran_jumlah` | int unsigned | default 0 |
| `lampiran_satuan` | varchar(20) | `lembar`, `berkas`, `bundle` |
| `halaman_jumlah` | int unsigned | default 0 |
| `halaman_satuan` | varchar(20) | `lembar`, `berkas`, `bundle` |
| `tingkat_perkembangan` | varchar(30) | `asli`, `umum`, `salinan` |
| `klasifikasi_kode` | varchar(4) | maksimal 4 digit |
| `klasifikasi_nama` | varchar(255) | |
| `perihal` | varchar(255) | |
| `ringkasan` | varchar(255), nullable | Ditambahkan pada migration kedua |
| `kelompok_surat` | varchar(50) | `berita_acara`, `biasa`, `cuti`, `instruksi`, `naskah_perjanjian_hibah_daerah`, `proposal`, `surat_edaran` |
| `kode_berkas` | varchar(4) | maksimal 4 digit |
| `nama_berkas` | varchar(255) | |
| `diteruskan_kepada` | varchar(255), nullable | Penerima disposisi (input manual) |
| `created_at`, `updated_at` | timestamp | |

**Nomor urut otomatis** dihitung di dalam transaksi:

```php
$surat = DB::transaction(function () use ($data) {
    $data['no_urut'] = (int) EntriSurat::max('no_urut') + 1;

    return EntriSurat::create($data);
});
```

### Tabel `klasifikasi`

Dibuat lewat migration `2026_11_04_000003_create_klasifikasi_table.php`
dan diisi oleh `KlasifikasiSeeder`.

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | bigint unsigned, PK | |
| `kode` | varchar(4), unique | Kode klasifikasi arsip |
| `nama` | varchar(255) | Nama klasifikasi |
| `created_at`, `updated_at` | timestamp | |

Jumlah data awal: **40 kode** (dari `dokumentasi/klasifikasi.txt`).
Duplikat kode `300` diambil "Keamanan dan Ketertiban", dan typo
"Kepegawaiaan" diperbaiki menjadi "Kepegawaian".

---

## 7. Form Identitas Surat

Halaman: `/` atau `/entri-surat` (setelah login).

Urutan field:

| # | Label | Tipe | Name |
|---|-------|------|------|
| 1 | Dari | Text | `dari` |
| 2 | Wilayah / Kota | Text | `wilayah_kota` |
| 3 | No. Urut Surat | Number readonly (otomatis) | `no_urut` |
| 4 | No. Surat | Text max 100 | `nomor_surat` |
| 5 | Tanggal Terima | Date | `tanggal_terima` |
| 6 | Tanggal Surat | Date | `tanggal_surat` |
| 7 | Sifat Surat | Select: Biasa, Rahasia | `sifat_surat` |
| 8 | Lampiran Surat | Number + Select: Lembar/Berkas/Bundle | `lampiran_jumlah`, `lampiran_satuan` |
| 9 | Halaman Surat | Number + Select: Lembar/Berkas/Bundle | `halaman_jumlah`, `halaman_satuan` |
| 10 | Tingkat Perkembangan | Select: Asli, Umum, Salinan | `tingkat_perkembangan` |
| 11 | Klasifikasi | Text max 4 digit + Text | `klasifikasi_kode`, `klasifikasi_nama` |
| 12 | Perihal Surat | Text | `perihal` |
| 13 | Kelompok Surat | Select: Berita Acara, Biasa, Cuti, Instruksi, Naskah Perjanjian Hibah Daerah, Proposal, Surat Edaran | `kelompok_surat` |
| 14 | Kode / Nama Berkas | Text max 4 digit + Text | `kode_berkas`, `nama_berkas` |
| 15 | Ringkasan | Textarea (full width) | `ringkasan` |
| 16 | Diteruskan Kepada | Text max 255, opsional | `diteruskan_kepada` |

**Catatan:** opsi dropdown di atas adalah asumsi awal dan mudah diubah.

**Ringkasan (textarea):**
- `rows="5"`, `maxlength="255"`, `required`
- lebar penuh (`.form-group.full`)
- `min-height: 160px`
- `padding: 10px 12px` agar teks mepet ke border atas
- `resize: vertical`

**Diteruskan Kepada (opsional):**
- Mencatat tujuan/instruksi lisan saat surat diterima, misalnya
  "diberikan ke Pak ...".
- Input teks manual, maks. 255 karakter, boleh kosong.
- Nilai ikut tampil di Daftar Surat dan Lembar Disposisi.

**Klasifikasi otomatis:**
- Input kode (`klasifikasi_kode`) diketik maksimal 4 digit.
- Input nama (`klasifikasi_nama`) dibuat **readonly**.
- JavaScript mencocokkan kode ke data master dan mengisi nama otomatis.
- Kode tidak ditemukan → nama kosong + info "Kode klasifikasi tidak ditemukan."
- Server memakai `Rule::exists('klasifikasi', 'kode')` dan mengambil ulang
  nama dari database, sehingga nama tidak bisa dimanipulasi dari browser.

**Validasi server (`store()`):**
- `dari`, `wilayah_kota`, `perihal`, `ringkasan`, `nama_berkas`: string, wajib
- `nomor_surat`: string max 100, wajib
- `tanggal_terima`, `tanggal_surat`: date
- `sifat_surat`: `in:biasa,rahasia`
- `lampiran_satuan`, `halaman_satuan`: `in:lembar,berkas,bundle`
- `tingkat_perkembangan`: `in:asli,umum,salinan`
- `kelompok_surat`: `in:berita_acara,biasa,cuti,instruksi,naskah_perjanjian_hibah_daerah,proposal,surat_edaran`
- `klasifikasi_kode`: `digits_between:1,4` + `exists:klasifikasi,kode`
- `kode_berkas`: `digits_between:1,4`
- jumlah lampiran/halaman: integer 0–9999
- `diteruskan_kepada`: nullable, string max 255

Setelah simpan: redirect ke `/entri-surat/{id}/cetak` dengan pesan
`Surat nomor urut X berhasil disimpan.`

**Mode edit dari Daftar Surat:**
- Klik **No. Urut** atau tautan **Edit** pada daftar surat.
- Halaman `/entri-surat?surat={id}` memuat data surat dan mengisi seluruh field.
- No. Urut tetap dan tidak bisa diubah.
- Judul form menjadi "Edit Identitas Surat" dan tombol utama menjadi
  **Simpan Perubahan**.
- Form dikirim ke `PUT /entri-surat/{id}`; data pada record yang sama diperbarui
  (tidak membuat nomor urut baru).
- Setelah update: kembali ke halaman edit dengan pesan
  `Surat nomor urut X berhasil diperbarui.`

---

## 8. File yang Dibuat / Diubah

### Controller
- `app/Http/Controllers/EntriSuratController.php`
- `app/Http/Controllers/Auth/LoginController.php`

### Middleware
- `app/Http/Middleware/EnsurePasswordGate.php`

### Model
- `app/Models/EntriSurat.php`
- `app/Models/Klasifikasi.php`

### Migration
- `database/migrations/2026_11_04_000001_create_entri_surat_table.php`
- `database/migrations/2026_11_04_000002_add_ringkasan_to_entri_surat_table.php`
- `database/migrations/2026_11_04_000003_create_klasifikasi_table.php`

### Seeder
- `database/seeders/KlasifikasiSeeder.php`
- `database/seeders/DatabaseSeeder.php` (memanggil `KlasifikasiSeeder`)

### View
- `resources/views/beranda.blade.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/entri-surat.blade.php`
- `resources/views/entri-surat-cetak.blade.php`
- `resources/views/daftar-surat.blade.php`
- `resources/views/jaringan-informasi-kearsipan-daerah.blade.php`
- `resources/views/auth/login-overlay.blade.php`

### Konfigurasi
- `routes/web.php`
- `bootstrap/app.php`
- `config/app.php`
- `.env` dan `.env.example`

---

## 9. Struktur Folder Penting

```
project-pkl/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── EntriSuratController.php
│   │   │   └── Auth/LoginController.php
│   │   └── Middleware/EnsurePasswordGate.php
│   └── Models/
│       ├── EntriSurat.php
│       ├── Klasifikasi.php
│       └── User.php
├── database/
│   ├── migrations/
│   │   ├── 2026_11_04_000001_create_entri_surat_table.php
│   │   ├── 2026_11_04_000002_add_ringkasan_to_entri_surat_table.php
│   │   └── 2026_11_04_000003_create_klasifikasi_table.php
│   └── seeders/
│       ├── KlasifikasiSeeder.php
│       └── DatabaseSeeder.php
├── resources/views/
│   ├── auth/login-overlay.blade.php
│   ├── layouts/app.blade.php
│   ├── beranda.blade.php
│   ├── entri-surat.blade.php
│   ├── entri-surat-cetak.blade.php
│   ├── daftar-surat.blade.php
│   └── jaringan-informasi-kearsipan-daerah.blade.php
├── routes/web.php
├── bootstrap/app.php
├── config/app.php
└── dokumentasi/
    ├── doc.md
    └── klasifikasi.txt
```

---

## 10. Cara Menjalankan

1. Pastikan Laragon (Apache/Nginx + MySQL) berjalan.
2. Buka `http://project-pkl.test/`.
3. Masukkan password `admin123`.
4. Isi form Identitas Surat lalu klik **Simpan**; aplikasi akan membuka
   halaman siap cetak.
5. Gunakan link **Lihat Surat** untuk melihat daftar surat yang sudah dibuat.

Perintah bermanfaat:

```bash
php artisan migrate
php artisan db:seed --class=KlasifikasiSeeder
php artisan config:clear
php artisan view:clear
php artisan route:list
```

Jika `php` tidak dikenali di terminal, gunakan Laragon Terminal atau path:

```
C:\laragon\bin\php\php-8.3.28-Win32-vs16-x64\php.exe
```

---

## 11. Implementasi Master Data Klasifikasi

Saat kode klasifikasi diketik (misal `000`), nama klasifikasi otomatis
terisi (misal `Umum`).

**Alur:**
1. Tabel `klasifikasi` menyimpan pasangan `kode` → `nama`.
2. Data diisi lewat `KlasifikasiSeeder` (40 kode).
3. `EntriSuratController@index` mengirim seluruh data ke view sebagai JSON.
4. JavaScript mencocokkan kode dan mengisi field nama yang readonly.
5. `store()` memvalidasi kode dengan `Rule::exists('klasifikasi', 'kode')`
   dan mengambil ulang nama dari database sebelum menyimpan.

**File terkait:**
- `app/Models/Klasifikasi.php`
- `database/seeders/KlasifikasiSeeder.php`
- `database/migrations/2026_11_04_000003_create_klasifikasi_table.php`
- `resources/views/entri-surat.blade.php` (blok `<script>`)

**Contoh hasil:**

| Kode diketik | Nama otomatis |
|--------------|---------------|
| `000` | Umum |
| `300` | Keamanan dan Ketertiban |
| `800` | Kepegawaian |
| `900` | Keuangan |

Pola yang sama dapat diterapkan pada **Kode / Nama Berkas** di masa depan.

---

## 12. Jumlah Surat, Tombol Aksi, dan Halaman Cetak

### 12.1 Jumlah surat dan Lihat Surat

Di pojok kanan atas card **Identitas Surat** terdapat badge:

```
Jumlah Surat: N
```

Di bawahnya ada link **Lihat Surat** menuju `/daftar-surat`.
Angka diambil dari `EntriSurat::count()`.

### 12.2 Tombol Simpan / Batal / Hapus

| Tombol | Fungsi |
|--------|--------|
| **Simpan** | Validasi + simpan ke database |
| **Batal** | Kembali ke form kosong (`/entri-surat`) |
| **Hapus** | Mengosongkan semua field form (tanpa menghapus database) |

Tombol Hapus juga membersihkan field nama klasifikasi dan info validasinya.

### 12.3 Alur setelah simpan

`store()` mengarahkan ke halaman cetak:

```php
return redirect()->route('entri-surat.cetak', $surat);
```

### 12.4 Halaman siap cetak

- URL: `/entri-surat/{id}/cetak` (`entri-surat.cetak`)
- View: `resources/views/entri-surat-cetak.blade.php`
- Berdiri sendiri tanpa layout aplikasi.
- Format **A4** (`@page { size: A4; margin: 15mm; }`), font Times New Roman 11pt.
- Struktur: kop instansi, tabel **LEMBAR DISPOSISI**, kotak informasi,
  diteruskan kepada, checkbox tindakan, catatan pimpinan, tanda tangan.
- Tombol **Cetak** (`window.print()`) dan **Kembali**, disembunyikan saat print.
- **Diteruskan Kepada** diambil dari data surat; jika kosong ditampilkan `-`.
- Nomor surat diambil dari field `nomor_surat`.
- Tanda tangan memakai nama Kepala Badan dari proposal (statis).

### 12.5 Daftar surat

- URL: `/daftar-surat` (`daftar-surat`)
- View: `resources/views/daftar-surat.blade.php`
- Menampilkan surat terbaru lebih dulu (`no_urut` descending), 15 per halaman.
- Kolom: No. Urut, Jenis Surat, Tgl Terima, No Surat, Diteruskan Kepada, Aksi (Edit, Cetak).
- Klik **No. Urut** atau **Edit** untuk membuka form Entri Surat dengan data
  surat tersebut sudah terisi.
- Jenis surat diisi otomatis "Surat Masuk" karena form entri saat ini khusus
  surat masuk (diambil dari accessor `jenis_surat` pada model).
- Tanggal diformat Indonesia, misal `04 Nov 2026`.
- Ada pagination manual (Sebelumnya / Berikutnya) tanpa dependensi Tailwind.
- Jika kosong: tampil "Belum ada surat yang dibuat."

---

## 13. Catatan dan Keterbatasan

- Password masih berupa teks biasa di `.env`. Untuk produksi disarankan
  hash (`Hash::make` / `Hash::check`) atau login berbasis tabel `users`.
- Fitur **edit** surat tersedia lewat tautan No. Urut/Edit di daftar surat.
  Fitur **hapus data** dari database belum ada; tombol Hapus pada mode tambah
  hanya mengosongkan form.
- Halaman cetak menampilkan data disposisi yang tersedia. Field yang belum
  diisi ditampilkan `-` / checkbox kosong.
- Print belum otomatis saat halaman dibuka; gunakan tombol **Cetak** atau
  `Ctrl + P`.
- Data uji coba pernah dimasukkan ke tabel `entri_surat`.
  Untuk mengosongkan: `DELETE FROM entri_surat;`
- Opsi dropdown (sifat, tingkat perkembangan, kelompok surat, satuan)
  masih asumsi dan dapat disesuaikan.
- Data klasifikasi bersumber dari `dokumentasi/klasifikasi.txt` (40 kode unik).
- Halaman JIKD saat ini hanya halaman statis; konten dapat dikembangkan
  sesuai proposal "Bogor Harmoni".
