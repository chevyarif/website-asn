<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Membuat tabel 'kategori_artikel'
 *
 * Tabel ini menyimpan kategori untuk artikel (misal: Berita, Tips, Tutorial).
 * Jalankan dengan: php spark migrate
 */
class CreateKategoriArtikelTable extends Migration
{
    // Fungsi up() dijalankan saat migrate → membuat tabel
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true, // slug harus unik untuk URL yang ramah SEO
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Set kolom 'id' sebagai Primary Key
        $this->forge->addPrimaryKey('id');

        // Buat tabelnya dengan nama 'kategori_artikel'
        $this->forge->createTable('kategori_artikel');
    }

    // Fungsi down() dijalankan saat migrate:rollback → hapus tabel
    public function down()
    {
        $this->forge->dropTable('kategori_artikel');
    }
}