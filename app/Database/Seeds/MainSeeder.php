<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * MainSeeder: Menjalankan SEMUA seeder sekaligus
 *
 * Jalankan dengan: php spark db:seed MainSeeder
 * Ini akan otomatis menjalankan UserSeeder dan ProdukSeeder.
 */
class MainSeeder extends Seeder
{
    public function run()
    {
        // Panggil semua seeder di sini
        $this->call('UserSeeder');
        $this->call('ProdukSeeder');
        $this->call('KontakSeeder');

        echo "✅ Semua seeder berhasil dijalankan!\n";
    }
}
