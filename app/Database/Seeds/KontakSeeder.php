<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder: Data dummy untuk tabel 'kontak'
 *
 * Jalankan dengan: php spark db:seed KontakSeeder
 * Atau sekaligus semua: php spark db:seed MainSeeder
 */
class KontakSeeder extends Seeder
{
    public function run()
    {
        // Data dummy untuk tabel kontak
        $data = [
            [
                'nama'         => 'Ahmad Fauzi',
                'email'        => 'ahmad@email.com',
                'subjek'       => 'Tanya layanan konsultasi',
                'pesan'        => 'Saya tertarik dengan layanan konsultasi bisnis. Bolehkah saya jadwalkan pertemuan minggu depan?',
                'sudah_dibaca' => 0,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama'         => 'Dewi Lestari',
                'email'        => 'dewi.lestari@email.com',
                'subjek'       => 'Pembuatan website perusahaan',
                'pesan'        => 'Kami membutuhkan website perusahaan yang responsif dan modern. Mohon informasi paket dan harga.',
                'sudah_dibaca' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama'         => 'Rudi Hartono',
                'email'        => 'rudi.h@email.com',
                'subjek'       => 'Paket maintenance bulanan',
                'pesan'        => 'Apakah paket maintenance mencakup update keamanan dan backup harian?',
                'sudah_dibaca' => 0,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama'         => 'Siti Nurhaliza',
                'email'        => 'siti.n@email.com',
                'subjek'       => 'Desain grafis logo',
                'pesan'        => 'Saya ingin membuat logo untuk usaha kuliner saya. Berapa estimasi waktu pengerjaan?',
                'sudah_dibaca' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama'         => 'Bambang Setiawan',
                'email'        => 'bambang.s@email.com',
                'subjek'       => 'Konsultasi gratis',
                'pesan'        => 'Apakah ada konsultasi gratis awal sebelum memutuskan paket layanan?',
                'sudah_dibaca' => 0,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama'         => 'Lina Marlina',
                'email'        => 'lina.m@email.com',
                'subjek'       => 'Tanya status website',
                'pesan'        => 'Website yang sudah dibangun kami mengalami error. Bisa tolong dicek segera?',
                'sudah_dibaca' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        // Masukkan data ke tabel 'kontak'
        $this->db->table('kontak')->insertBatch($data);

        echo "✅ KontakSeeder berhasil dijalankan!\n";
    }
}
