![Banner](https://capsule-render.vercel.app/api?type=waving&height=220&color=0:0f172a,100:1d4ed8&text=Perpustakaan%20Digital%20Kampus&fontColor=ffffff&fontSize=42&fontAlignY=38&desc=Laravel%20MVC&descAlignY=60)

# Perpustakaan Digital Kampus

[![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](https://opensource.org/licenses/MIT)

Project ini adalah aplikasi simulasi perpustakaan digital berbasis Laravel MVC dengan dua role user (`admin` dan `member`). Fokus utamanya adalah manajemen data buku, autentikasi user, dan dashboard ringkas untuk monitoring koleksi.

## 📑 Daftar Isi

- [🎯 Ringkasan Proyek](#-ringkasan-proyek)
- [✨ Fitur Utama](#-fitur-utama)
- [🛠️ Stack Teknologi](#️-stack-teknologi)
- [🗂️ Struktur Folder](#️-struktur-folder)
- [🚀 Quick Start](#-quick-start)
- [🔐 Akun Admin Default](#-akun-admin-default)
- [🧭 Routing Utama](#-routing-utama)
- [🧪 Testing](#-testing)
- [📝 Catatan Pengembangan](#-catatan-pengembangan)
- [🤝 Kontribusi](#-kontribusi)

## 🎯 Ringkasan Proyek

Sistem ini menyediakan katalog buku kampus yang bisa diakses publik, sementara fitur manajemen data dibatasi untuk admin. User member tetap mendapatkan dashboard dan pengelolaan profil pribadi.

## ✨ Fitur Utama

- Landing page dengan statistik (`total buku`, `member aktif`) dan daftar buku terbaru.
- Autentikasi user (register, login, logout) via Laravel Breeze.
- Pencarian katalog buku berdasarkan `judul`, `penulis`, dan `isbn`.
- Pagination pada daftar buku.
- Detail buku dapat diakses tanpa login.
- Dashboard user setelah login.
- Role access yang jelas untuk `member` dan `admin`.
- Pengelolaan profil user (ubah data, ubah password, hapus akun).

| Role | Akses |
| --- | --- |
| `member` | Dashboard + profil |
| `admin` | Semua akses member + CRUD buku |

## 🛠️ Stack Teknologi

- Backend: Laravel 13, PHP 8.3, Eloquent ORM
- Frontend: Blade, Bootstrap 5, Vite
- Database: MySQL/SQLite (mengikuti konfigurasi `.env`)
- Auth Scaffold: Laravel Breeze

## 🗂️ Struktur Folder

<details>
  <summary><strong>Click here to expand</strong></summary>

```text
projek_kj/
|- app/
|  |- Http/
|  |  |- Controllers/
|  |  `- Middleware/
|  `- Models/
|- database/
|  |- migrations/
|  `- seeders/
|- resources/
|  |- views/
|  `- css/
|- routes/
|  `- web.php
`- README.md
```

</details>

Folder yang bisa diklik:

- [`app/`](app)
- [`app/Http/Controllers/`](app/Http/Controllers)
- [`app/Http/Middleware/`](app/Http/Middleware)
- [`app/Models/`](app/Models)
- [`database/migrations/`](database/migrations)
- [`database/seeders/`](database/seeders)
- [`resources/views/`](resources/views)
- [`routes/web.php`](routes/web.php)

## 🚀 Quick Start

<details>
  <summary><strong>Click here to expand</strong></summary>

1. Clone repository

```bash
git clone https://github.com/mocharezky04/projek_kj.git
cd projek_kj
```

2. Install dependency, generate key, migrate, dan build assets

```bash
composer run setup
```

3. Jalankan mode development

```bash
composer run dev
```

4. Buka di browser

```text
http://127.0.0.1:8000
```

</details>

## 🔐 Akun Admin Default

Seeder `AdminUserSeeder` menyiapkan akun berikut:

- Email: `admin@perpus.test`
- Password: `password`

Gunakan untuk lokal/development, lalu ganti password setelah login.

## 🧭 Routing Utama

<details>
  <summary><strong>Click here to expand</strong></summary>

| Endpoint | Akses | Deskripsi |
| --- | --- | --- |
| `/` | Publik | Halaman utama + ringkasan koleksi |
| `/books` | Publik | Daftar buku + pencarian |
| `/books/{book}` | Publik | Detail buku |
| `/dashboard` | Login | Dashboard user |
| `/profile` | Login | Kelola profil |
| `/books/create`, `/books/{book}/edit` dll | Admin | CRUD data buku |

</details>

## 🧪 Testing

<details>
  <summary><strong>Click here to expand</strong></summary>

```bash
composer run test
```

</details>

## 📝 Catatan Pengembangan

- Middleware admin terdaftar sebagai `admin`.
- Validasi buku mencakup ISBN unik, tahun terbit valid, dan stok minimal `0`.
- Cover buku berupa URL opsional dengan fallback placeholder.

## 🤝 Kontribusi

Masukan dan pull request sangat terbuka untuk peningkatan fitur, perbaikan bug, atau perapian dokumentasi.
