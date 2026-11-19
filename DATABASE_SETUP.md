# Panduan Setup Database — Website ASN

Dokumen ini untuk tim backend yang akan menjalankan migrasi dan seeder database pada environment masing-masing.

## 1. Prasyarat

- [XAMPP](https://www.apachefriends.org/) terinstall (Apache + MySQL + PHP)
- PHP 8.2 atau lebih tinggi
- MySQL/MariaDB berjalan melalui XAMPP Control Panel
- Database `website_asn` sudah dibuat di MySQL (bisa via Navicat / phpMyAdmin)

## 2. Konfigurasi Environment

Salin file `env` ke `.env` di root project:

```powershell
Copy-Item env .env
```

Buka `.env` dan pastikan bagian database sesuai dengan environment Anda:

```ini
database.default.hostname = localhost
database.default.database = website_asn
database.default.username = root
database.default.password =       # kosongkan jika pakai default XAMPP
database.default.DBDriver = MySQLi
database.default.port = 3306
database.default.charset = utf8mb4
database.default.DBCollat = utf8mb4_general_ci
```

> Pastikan nama database (`website_asn`) sudah dibuat di MySQL sebelum menjalankan migration.

## 3. Jalankan Migration (Buat Tabel)

Dari root project, jalankan:

```powershell
cd c:\xampp\htdocs\website-asn
c:\xampp\php\php.exe spark migrate
```

Output yang diharapkan:

```text
Running: 2026-11-19-000001_CreateUsersTable
Running: 2026-11-19-000002_CreateProdukTable
Running: 2026-11-19-000003_CreateKontakTable
Done
```

Tabel yang akan dibuat:

| Tabel | Keterangan |
|-------|------------|
| `migrations` | Log history migration (otomatis oleh CodeIgniter) |
| `users` | Data pengguna / admin website |
| `produk` | Data produk / layanan ASN |
| `kontak` | Pesan masuk dari form kontak website |

## 4. Jalankan Seeder (Isi Data Dummy)

```powershell
c:\xampp\php\php.exe spark db:seed MainSeeder
```

Output yang diharapkan:

```text
✅ UserSeeder berhasil dijalankan!
✅ ProdukSeeder berhasil dijalankan!
✅ KontakSeeder berhasil dijalankan!
✅ Semua seeder berhasil dijalankan!
```

## 5. Isi Tabel Setelah Seed

| Tabel | Jumlah Data | Keterangan |
|-------|-------------|------------|
| `users` | 3 | 1 admin (`admin@asn.com`) + 2 user |
| `produk` | 4 | 4 produk/layanan (1 status `nonaktif`) |
| `kontak` | 6 | Data dummy pesan kontak (campuran sudah_dibaca 0 dan 1) |

### Detail Data Dummy `users`

| Nama | Email | Role | Password |
|------|-------|------|----------|
| Admin ASN | admin@asn.com | admin | `admin123` |
| Budi Santoso | budi@email.com | user | `user123` |
| Siti Rahayu | siti@email.com | user | `user123` |

Password sudah di-hash dengan `password_hash()`.

### Detail Data Dummy `produk`

| Nama Produk | Kategori | Harga | Status |
|-------------|----------|-------|--------|
| Layanan Konsultasi | Jasa | Rp 500.000 | aktif |
| Pembuatan Website | Jasa | Rp 2.500.000 | aktif |
| Paket Maintenance | Paket | Rp 300.000 | aktif |
| Desain Grafis | Jasa | Rp 750.000 | nonaktif |

## 6. Perintah Berguna Lainnya

Rollback semua migration (hapus semua tabel):

```powershell
c:\xampp\php\php.exe spark migrate:rollback
```

Rollback semua dan migrate ulang dari awal:

```powershell
c:\xampp\php\php.exe spark migrate:refresh
```

Cek status migration:

```powershell
c:\xampp\php\php.exe spark migrate:status
```

## 7. Catatan untuk Tim Backend

- Semua migration dan seeder sudah berada di `app/Database/Migrations` dan `app/Database/Seeds`.
- Jika ingin menambahkan tabel baru, buat migration file baru dengan prefix timestamp (contoh: `2026-11-19-000004_CreateNamaTable.php`).
- Jika ingin menambahkan data dummy baru, buat seeder baru dan panggil dari `MainSeeder`.
- Tabel `kontak` biasanya diisi dari form kontak website, tidak perlu diinput manual di production.
- Pastikan urutan migration tidak bertabrakan jika ada foreign key antar tabel di masa depan.
