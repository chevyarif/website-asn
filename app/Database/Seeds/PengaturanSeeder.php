<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder: Data awal untuk tabel 'pengaturan'
 *
 * Jalankan dengan: php spark db:seed PengaturanSeeder
 * Atau sekaligus semua: php spark db:seed MainSeeder
 */
class PengaturanSeeder extends Seeder
{
    public function run()
    {
        // Kosongkan tabel terlebih dahulu agar aman dijalankan ulang
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->db->table('pengaturan')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');

        // Data dummy untuk tabel pengaturan (key-value identitas website)
        $data = [
            [
                'kunci'       => 'nama_organisasi',
                'nilai'       => 'Pemerintah ASN',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'tagline',
                'nilai'       => 'Melayani dengan baik dan benar',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'alamat',
                'nilai'       => 'Jl. Contoh No. 123, Kota ASN',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'kota',
                'nilai'       => 'Jakarta',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'email',
                'nilai'       => 'info@asn.go.id',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'telepon',
                'nilai'       => '021-1234567',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'whatsapp',
                'nilai'       => '081234567890',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'jam_operasional',
                'nilai'       => 'Senin - Jumat, 08.00 - 16.00 WIB',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'instagram',
                'nilai'       => '@asn_resmi',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'facebook',
                'nilai'       => 'Pemerintah ASN',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'youtube',
                'nilai'       => 'youtube.com/asn',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'google_maps',
                'nilai'       => 'https://goo.gl/maps/contoh',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'website',
                'nilai'       => 'www.pt--asn.co.id',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'kunci'       => 'logo',
                'nilai'       => 'uploads/logo/asn.png',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        // Masukkan data ke tabel 'pengaturan'
        $this->db->table('pengaturan')->insertBatch($data);

        echo "✅ PengaturanSeeder berhasil dijalankan!\n";
    }
}