<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Membuat tabel 'pengaturan'
 *
 * Tabel ini menyimpan konfigurasi key-value untuk identitas website
 * (alamat, email, telepon, WhatsApp, media sosial, dan sebagainya).
 * Jalankan dengan: php spark migrate
 */
class CreatePengaturanTable extends Migration
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
            'kunci' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true, // kunci harus unik, tidak boleh duplikat
            ],
            'nilai' => [
                'type' => 'TEXT',
                'null' => true,
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

        // Buat tabelnya dengan nama 'pengaturan'
        $this->forge->createTable('pengaturan');
    }

    // Fungsi down() dijalankan saat migrate:rollback → hapus tabel
    public function down()
    {
        $this->forge->dropTable('pengaturan');
    }
}