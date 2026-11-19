<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Membuat tabel 'produk'
 *
 * Tabel ini menyimpan data produk / layanan yang ditawarkan ASN.
 * Jalankan dengan: php spark migrate
 */
class CreateProdukTable extends Migration
{
    // Fungsi up() → membuat tabel saat migrate dijalankan
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default'    => 'aktif',
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

        // Buat tabel dengan nama 'produk'
        $this->forge->createTable('produk');
    }

    // Fungsi down() → hapus tabel saat rollback
    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
