![Banner](https://capsule-render.vercel.app/api?type=waving&height=220&color=0:0f172a,100:1d4ed8&text=Perpustakaan%20Digital%20Kampus&fontColor=ffffff&fontSize=42&fontAlignY=38&desc=Tugas%201%20PBW%20%7C%20Laravel%20MVC&descAlignY=60)

# Perpustakaan Digital Kampus

[![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](https://opensource.org/licenses/MIT)

Project ini adalah aplikasi simulasi perpustakaan digital berbasis Laravel MVC dengan dua role user (`admin` dan `member`). Fokus utamanya: manajemen data buku, autentikasi user, dan dashboard ringkas untuk monitoring koleksi. 📚

## Fitur Utama

- Landing page dengan ringkasan statistik (`total buku`, `member aktif`) dan daftar buku terbaru.
- Autentikasi user (register, login, logout) menggunakan Laravel Breeze.
- Katalog buku publik dengan pencarian (`judul`, `penulis`, `isbn`) + pagination.
- Detail buku dapat diakses semua user.
- Role-based access:
  - `member`: akses dashboard dan profil.
  - `admin`: akses penuh CRUD buku (tambah, ubah, hapus).
- Manajemen profil user: update data akun, password, dan hapus akun.

## Stack Teknologi

- Backend: Laravel 13, PHP 8.3, Eloquent ORM
- Frontend: Blade, Bootstrap 5, Vite
- Database: MySQL/SQLite (sesuai konfigurasi `.env`)
- Authentication scaffold: Laravel Breeze

## Struktur Singkat

```text
app/Http/Controllers   -> logic Home, Book, Profile
app/Http/Middleware    -> middleware admin (EnsureUserIsAdmin)
app/Models             -> model Book dan User
database/migrations    -> skema tabel users + books
database/seeders       -> seeder admin + data awal
resources/views        -> tampilan Blade
routes/web.php         -> routing aplikasi
```

## Quick Start

1. Clone repository

```bash
git clone https://github.com/mocharezky04/projek_kj.git
cd projek_kj
```

2. Install dependency backend + frontend, generate key, migrate, dan build assets

```bash
composer run setup
```

3. Jalankan development server

```bash
composer run dev
```

4. Buka aplikasi di browser

```text
http://127.0.0.1:8000
```

## Akun Admin Default (Seeder)

Seeder `AdminUserSeeder` membuat akun admin berikut:

- Email: `admin@perpus.test`
- Password: `password`

Gunakan hanya untuk development lokal, lalu ganti password setelah login.

## Routing Utama

| Endpoint | Akses | Deskripsi |
| --- | --- | --- |
| `/` | Publik | Halaman utama + ringkasan koleksi |
| `/books` | Publik | Daftar buku + pencarian |
| `/books/{book}` | Publik | Detail buku |
| `/dashboard` | Login | Dashboard user |
| `/profile` | Login | Kelola profil |
| `/books/create`, `/books/{book}/edit` dll | Admin | CRUD data buku |

## Testing

Jalankan test dengan:

```bash
composer run test
```

## Catatan Pengembangan

- Middleware admin terdaftar sebagai `admin`.
- Validasi data buku mencakup ISBN unik, tahun terbit valid, dan stok minimal `0`.
- Cover buku menggunakan URL (opsional), dengan fallback placeholder pada UI.

## Kontribusi

Pull request dan masukan sangat terbuka. Jika kamu menemukan bug atau ide peningkatan, silakan buat issue/pull request agar project ini makin rapi dan bermanfaat. 🙌
