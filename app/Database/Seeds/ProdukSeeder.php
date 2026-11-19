<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder: Data awal untuk tabel 'produk'
 *
 * Jalankan dengan: php spark db:seed ProdukSeeder
 */
class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_produk' => 'Layanan Konsultasi',
                'deskripsi'   => 'Layanan konsultasi profesional untuk membantu bisnis Anda berkembang.',
                'harga'       => 500000.00,
                'kategori'    => 'Jasa',
                'gambar'      => null,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_produk' => 'Pembuatan Website',
                'deskripsi'   => 'Jasa pembuatan website profesional, responsif, dan modern.',
                'harga'       => 2500000.00,
                'kategori'    => 'Jasa',
                'gambar'      => null,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_produk' => 'Paket Maintenance',
                'deskripsi'   => 'Perawatan dan pemeliharaan website bulanan agar tetap optimal.',
                'harga'       => 300000.00,
                'kategori'    => 'Paket',
                'gambar'      => null,
                'status'      => 'aktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_produk' => 'Desain Grafis',
                'deskripsi'   => 'Jasa desain logo, banner, dan materi promosi bisnis Anda.',
                'harga'       => 750000.00,
                'kategori'    => 'Jasa',
                'gambar'      => null,
                'status'      => 'nonaktif',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('produk')->insertBatch($data);

        echo "✅ ProdukSeeder berhasil dijalankan!\n";
    }
}
