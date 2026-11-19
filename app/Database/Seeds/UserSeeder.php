<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder: Data awal untuk tabel 'users'
 *
 * Jalankan dengan: php spark db:seed UserSeeder
 * Atau sekaligus semua: php spark db:seed MainSeeder
 */
class UserSeeder extends Seeder
{
    public function run()
    {
        // Data dummy untuk tabel users
        $data = [
            [
                'nama'       => 'Admin ASN',
                'email'      => 'admin@asn.com',
                // Password: admin123 (sudah di-hash dengan password_hash)
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Budi Santoso',
                'email'      => 'budi@email.com',
                'password'   => password_hash('user123', PASSWORD_DEFAULT),
                'role'       => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'       => 'Siti Rahayu',
                'email'      => 'siti@email.com',
                'password'   => password_hash('user123', PASSWORD_DEFAULT),
                'role'       => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Masukkan data ke tabel 'users'
        $this->db->table('users')->insertBatch($data);

        echo "✅ UserSeeder berhasil dijalankan!\n";
    }
}
