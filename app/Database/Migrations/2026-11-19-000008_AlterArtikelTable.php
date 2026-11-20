<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Migration: Mengubah tabel 'artikel'
 *
 * - Ganti nama kolom 'penulis' menjadi 'created_by' (INT, FK ke users.id)
 * - Tambah kolom 'updated_by' (INT, FK ke users.id, nullable)
 * Jalankan dengan: php spark migrate
 */
class AlterArtikelTable extends Migration
{
    // Fungsi up() dijalankan saat migrate → ubah struktur tabel
    public function up()
    {
        // Tambah kolom created_by dan updated_by (nullable untuk data lama)
        $this->forge->addColumn('artikel', [
            'created_by' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true,
                'after'          => 'kategori_id',
            ],
            'updated_by' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'null'           => true,
                'after'          => 'created_by',
            ],
        ]);

        // Isi created_by dengan user id 1 (Admin ASN) untuk data artikel yang sudah ada
        // karena kolom lama 'penulis' berisi nama string, bukan user id
        $this->db->query("UPDATE artikel SET created_by = 1 WHERE created_by IS NULL");

        // Hapus kolom lama 'penulis'
        $this->forge->dropColumn('artikel', 'penulis');

        // Tambah foreign key created_by → users.id
        // ON DELETE RESTRICT: user tidak dapat dihapus jika masih membuat artikel
        // ON UPDATE CASCADE: jika id user berubah, artikel juga diperbarui
        $this->forge->addForeignKey('created_by', 'users', 'id', 'RESTRICT', 'CASCADE');

        // Tambah foreign key updated_by → users.id
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'RESTRICT', 'CASCADE');
    }

    // Fungsi down() dijalankan saat migrate:rollback → kembalikan struktur lama
    public function down()
    {
        // Hapus foreign key
        $this->db->query('ALTER TABLE artikel DROP FOREIGN KEY artikel_created_by_foreign');
        $this->db->query('ALTER TABLE artikel DROP FOREIGN KEY artikel_updated_by_foreign');

        // Hapus kolom baru
        $this->forge->dropColumn('artikel', 'created_by');
        $this->forge->dropColumn('artikel', 'updated_by');

        // Kembalikan kolom lama 'penulis'
        $this->forge->addColumn('artikel', [
            'penulis' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);
    }
}