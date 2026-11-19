<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Membuat tabel 'galeri'
 *
 * Tabel ini menyimpan data galeri foto dengan path gambar dan kategori.
 * Jalankan dengan: php spark migrate
 */
class CreateGaleriTable extends Migration
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
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'path_gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'urutan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0, // untuk pengurutan tampilan galeri
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

        // Set Primary Key
        $this->forge->addPrimaryKey('id');

        // Buat tabelnya dengan nama 'galeri'
        $this->forge->createTable('galeri');
    }

    // Fungsi down() dijalankan saat migrate:rollback → hapus tabel
    public function down()
    {
        $this->forge->dropTable('galeri');
    }
}