<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder: Data awal untuk tabel 'kategori_artikel'
 *
 * Jalankan dengan: php spark db:seed KategoriArtikelSeeder
 * Atau sekaligus semua: php spark db:seed MainSeeder
 */
class KategoriArtikelSeeder extends Seeder
{
    public function run()
    {
        // Kosongkan tabel terlebih dahulu agar aman dijalankan ulang
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->db->table('kategori_artikel')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        // Data dummy untuk tabel kategori_artikel
        $data = [
            [
                'nama'       => 'Berita',
                'slug'       => 'berita',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Tips',
                'slug'       => 'tips',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Tutorial',
                'slug'       => 'tutorial',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Masukkan data ke tabel 'kategori_artikel'
        $this->db->table('kategori_artikel')->insertBatch($data);

        echo "✅ KategoriArtikelSeeder berhasil dijalankan!\n";
    }
}