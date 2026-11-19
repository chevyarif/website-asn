<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Membuat tabel 'artikel'
 *
 * Tabel ini menyimpan data artikel dengan relasi ke tabel kategori_artikel.
 * Foreign key 'kategori_id' merujuk ke 'kategori_artikel.id'.
 * Jalankan dengan: php spark migrate
 */
class CreateArtikelTable extends Migration
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
            'kategori_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => false, // setiap artikel harus memiliki kategori
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'unique'     => true, // slug harus unik untuk URL artikel
            ],
            'ringkasan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'isi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'published'],
                'default'    => 'draft',
            ],
            'published_at' => [
                'type' => 'DATETIME',
                'null' => true, // nullable: hanya diisi saat artikel dipublish
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

        // Foreign key ke tabel kategori_artikel
        // ON DELETE RESTRICT: kategori tidak dapat dihapus jika masih digunakan artikel
        // ON UPDATE CASCADE: jika id kategori berubah, artikel juga akan diperbarui
        $this->forge->addForeignKey('kategori_id', 'kategori_artikel', 'id', 'RESTRICT', 'CASCADE');

        // Buat tabelnya dengan nama 'artikel'
        $this->forge->createTable('artikel');
    }

    // Fungsi down() dijalankan saat migrate:rollback → hapus tabel
    public function down()
    {
        $this->forge->dropTable('artikel');
    }
}