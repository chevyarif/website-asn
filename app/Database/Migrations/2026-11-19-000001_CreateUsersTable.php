<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Membuat tabel 'users'
 *
 * Tabel ini menyimpan data pengguna / admin website.
 * Jalankan dengan: php spark migrate
 */
class CreateUsersTable extends Migration
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
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'unique'     => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'user'],
                'default'    => 'user',
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

        // Buat tabelnya dengan nama 'users'
        $this->forge->createTable('users');
    }

    // Fungsi down() dijalankan saat migrate:rollback → hapus tabel
    public function down()
    {
        $this->forge->dropTable('users');
    }
}
