<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder: Data dummy untuk tabel 'artikel'
 *
 * Jalankan dengan: php spark db:seed ArtikelSeeder
 * Atau sekaligus semua: php spark db:seed MainSeeder
 */
class ArtikelSeeder extends Seeder
{
    public function run()
    {
        // Kosongkan tabel terlebih dahulu agar aman dijalankan ulang
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->db->table('artikel')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        $now = date('Y-m-d H:i:s');

        // Data dummy untuk tabel artikel (10 data: 8 published, 2 draft)
        // Disebarkan di 3 kategori: Berita(1), Tips(2), Tutorial(3)
        $data = [
            [
                'kategori_id' => 1,
                'judul'       => 'Pembukaan Kantor ASN Baru',
                'slug'        => 'pembukaan-kantor-asn-baru',
                'ringkasan'   => 'Kantor baru resmi dibuka untuk masyarakat.',
                'isi'         => '<p>Pemerintah ASN telah membuka kantor baru yang strategis.</p><p>Kantor ini dilengkapi fasilitas modern untuk pelayanan publik.</p>',
                'gambar'      => 'uploads/artikel/kantor-baru.jpg',
                'penulis'     => 'Admin ASN',
                'status'      => 'published',
                'published_at'=> '2026-01-10 08:00:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 1,
                'judul'       => 'Program Pelatihan Karyawan',
                'slug'        => 'program-pelatihan-karyawan',
                'ringkasan'   => 'Pelatihan keterampilan karyawan diadakan rutin.',
                'isi'         => '<p>Program pelatihan karyawan diadakan setiap bulan.</p><p>Peserta mendapatkan sertifikat setelah lulus pelatihan.</p>',
                'gambar'      => 'uploads/artikel/pelatihan.jpg',
                'penulis'     => 'Admin ASN',
                'status'      => 'published',
                'published_at'=> '2026-02-15 09:30:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 1,
                'judul'       => 'Kunjungan Kehormatan',
                'slug'        => 'kunjungan-kehormatan',
                'ringkasan'   => 'Tamu kehomatan mengunjungi kantor ASN.',
                'isi'         => '<p>Kunjungan kehormatan dari negara mitra dilakukan hari ini.</p><p>Kedatangan dipenuhi oleh pemimpin ASN sendiri.</p>',
                'gambar'      => 'uploads/artikel/kunjungan.jpg',
                'penulis'     => 'Admin ASN',
                'status'      => 'published',
                'published_at'=> '2026-03-05 10:00:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 2,
                'judul'       => 'Tips Menulis Surat Resmi',
                'slug'        => 'tips-menulis-surat-resmi',
                'ringkasan'   => 'Panduan menulis surat resmi yang benar.',
                'isi'         => '<p>Surat resmi harus menggunakan bahasa formal.</p><p>Pastikan struktur surat mencakup kepala, isi, dan penutup.</p>',
                'gambar'      => 'uploads/artikel/surat-resmi.jpg',
                'penulis'     => 'Redaksi ASN',
                'status'      => 'published',
                'published_at'=> '2026-04-01 11:00:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 2,
                'judul'       => 'Cara Mengelola Waktu Kerja',
                'slug'        => 'cara-mengelola-waktu-kerja',
                'ringkasan'   => 'Tips produktivitas untuk karyawan ASN.',
                'isi'         => '<p>Buat daftar tugas harian untuk mengatur prioritas.</p><p>Istirahat singkat dapat meningkatkan konsentrasi kerja.</p>',
                'gambar'      => 'uploads/artikel/waktu-kerja.jpg',
                'penulis'     => 'Redaksi ASN',
                'status'      => 'published',
                'published_at'=> '2026-05-10 14:00:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 3,
                'judul'       => 'Tutorial Pembuatan Akun',
                'slug'        => 'tutorial-pembuatan-akun',
                'ringkasan'   => 'Langkah-langkah membuat akun di portal ASN.',
                'isi'         => '<p>Kunjungi situs resmi dan klik tombol daftar.</p><p>Isi formulir dengan data pribadi yang valid.</p>',
                'gambar'      => 'uploads/artikel/daftar-akun.jpg',
                'penulis'     => 'Tim IT ASN',
                'status'      => 'published',
                'published_at'=> '2026-06-01 08:00:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 3,
                'judul'       => 'Cara Mengajukan Cuti Online',
                'slug'        => 'cara-mengajukan-cuti-online',
                'ringkasan'   => 'Panduan mengajukan cuti melalui sistem online.',
                'isi'         => '<p>Login ke portal karyawan lalu pilih menu cuti.</p><p>Isi tanggal cuti dan alasan, kemudian ajukan persetujuan.</p>',
                'gambar'      => 'uploads/artikel/cuti-online.jpg',
                'penulis'     => 'Tim IT ASN',
                'status'      => 'published',
                'published_at'=> '2026-07-05 09:00:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 2,
                'judul'       => 'Etika Berkomunikasi Kantor',
                'slug'        => 'etika-berkomunikasi-kantor',
                'ringkasan'   => 'Panduan berkomunikasi yang baik di tempat kerja.',
                'isi'         => '<p>Gunakan bahasa yang sopan saat berbicara dengan rekan kerja.</p><p>Hormati pendapat orang lain saat berdiskusi.</p>',
                'gambar'      => 'uploads/artikel/etika.jpg',
                'penulis'     => 'Redaksi ASN',
                'status'      => 'draft',
                'published_at'=> null,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 1,
                'judul'       => 'Rapat Tahunan ASN',
                'slug'        => 'rapat-tahunan-asn',
                'ringkasan'   => 'Rapat tahunan untuk evaluasi kinerja.',
                'isi'         => '<p>Rapat tahunan diadakan untuk menilai pencapaian.</p><p>Semua unit kerja diundang untuk hadir dan berpartisipasi.</p>',
                'gambar'      => 'uploads/artikel/rapat.jpg',
                'penulis'     => 'Admin ASN',
                'status'      => 'draft',
                'published_at'=> null,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'kategori_id' => 3,
                'judul'       => 'Panduan Login Portal',
                'slug'        => 'panduan-login-portal',
                'ringkasan'   => 'Cara login ke portal resmi ASN.',
                'isi'         => '<p>Masukkan username dan password yang terdaftar.</p><p>Klik tombol masuk untuk mengakses dashboard.</p>',
                'gambar'      => 'uploads/artikel/login-portal.jpg',
                'penulis'     => 'Tim IT ASN',
                'status'      => 'published',
                'published_at'=> '2026-08-12 10:00:00',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        // Masukkan data ke tabel 'artikel'
        $this->db->table('artikel')->insertBatch($data);

        echo "✅ ArtikelSeeder berhasil dijalankan!\n";
    }
}