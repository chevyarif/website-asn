<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder: Data dummy untuk tabel 'galeri'
 *
 * Jalankan dengan: php spark db:seed GaleriSeeder
 * Atau sekaligus semua: php spark db:seed MainSeeder
 */
class GaleriSeeder extends Seeder
{
    public function run()
    {
        // Kosongkan tabel terlebih dahulu agar aman dijalankan ulang
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->db->table('galeri')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        $now = date('Y-m-d H:i:s');

        // Data dummy untuk tabel galeri (12 data, path gambar hanya contoh teks)
        $data = [
            [
                'judul'       => 'Kantor Utama',
                'deskripsi'   => 'Foto depan kantor utama ASN.',
                'path_gambar' => 'uploads/galeri/foto-01.jpg',
                'kategori'    => 'Kantor',
                'urutan'      => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Ruang Rapat',
                'deskripsi'   => 'Foto ruang rapat kantor.',
                'path_gambar' => 'uploads/galeri/foto-02.jpg',
                'kategori'    => 'Kantor',
                'urutan'      => 2,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Lobby',
                'deskripsi'   => 'Foto area lobby penerimaan tamu.',
                'path_gambar' => 'uploads/galeri/foto-03.jpg',
                'kategori'    => 'Kantor',
                'urutan'      => 3,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Perpustakaan',
                'deskripsi'   => 'Foto ruang perpustakaan kantor.',
                'path_gambar' => 'uploads/galeri/foto-04.jpg',
                'kategori'    => 'Fasilitas',
                'urutan'      => 4,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Kantin',
                'deskripsi'   => 'Foto area kantin untuk karyawan.',
                'path_gambar' => 'uploads/galeri/foto-05.jpg',
                'kategori'    => 'Fasilitas',
                'urutan'      => 5,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Parkir',
                'deskripsi'   => 'Foto area parkir kantor.',
                'path_gambar' => 'uploads/galeri/foto-06.jpg',
                'kategori'    => 'Fasilitas',
                'urutan'      => 6,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Acara Pelatihan',
                'deskripsi'   => 'Foto kegiatan pelatihan karyawan.',
                'path_gambar' => 'uploads/galeri/foto-07.jpg',
                'kategori'    => 'Acara',
                'urutan'      => 7,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Kunjungan Tamu',
                'deskripsi'   => 'Foto kunjungan tamu kehormatan.',
                'path_gambar' => 'uploads/galeri/foto-08.jpg',
                'kategori'    => 'Acara',
                'urutan'      => 8,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Hari Kartini',
                'deskripsi'   => 'Foto perayaan Hari Kartini di kantor.',
                'path_gambar' => 'uploads/galeri/foto-09.jpg',
                'kategori'    => 'Acara',
                'urutan'      => 9,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Hari Kemerdekaan',
                'deskripsi'   => 'Foto perayaan Hari Kemerdekaan di kantor.',
                'path_gambar' => 'uploads/galeri/foto-10.jpg',
                'kategori'    => 'Acara',
                'urutan'      => 10,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Tim IT',
                'deskripsi'   => 'Foto bersama tim pengembang IT.',
                'path_gambar' => 'uploads/galeri/foto-11.jpg',
                'kategori'    => 'Karyawan',
                'urutan'      => 11,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'judul'       => 'Karyawan Teladan',
                'deskripsi'   => 'Foto karyawan terbaik bulan ini.',
                'path_gambar' => 'uploads/galeri/foto-12.jpg',
                'kategori'    => 'Karyawan',
                'urutan'      => 12,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        // Masukkan data ke tabel 'galeri'
        $this->db->table('galeri')->insertBatch($data);

        echo "✅ GaleriSeeder berhasil dijalankan!\n";
    }
}