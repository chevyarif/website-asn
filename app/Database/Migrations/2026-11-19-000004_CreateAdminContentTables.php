<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminContentTables extends Migration
{
    public function up()
    {
        // 1. Tabel blog
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul'      => ['type' => 'VARCHAR', 'constraint' => 200],
            'slug'       => ['type' => 'VARCHAR', 'constraint' => 220, 'unique' => true],
            'ringkasan'  => ['type' => 'TEXT', 'null' => true],
            'konten'     => ['type' => 'LONGTEXT'],
            'gambar'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status'     => ['type' => 'ENUM', 'constraint' => ['draft', 'published'], 'default' => 'draft'],
            'penulis_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('penulis_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('blog', true);

        // 2. Tabel gallery
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul'      => ['type' => 'VARCHAR', 'constraint' => 180],
            'kategori'   => ['type' => 'VARCHAR', 'constraint' => 100, 'default' => 'Umum'],
            'gambar'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'keterangan' => ['type' => 'TEXT', 'null' => true],
            'urutan'     => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'status'     => ['type' => 'ENUM', 'constraint' => ['aktif', 'nonaktif'], 'default' => 'aktif'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gallery', true);

        // 3. Tabel tentang_kami
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul'      => ['type' => 'VARCHAR', 'constraint' => 180],
            'visi'       => ['type' => 'TEXT'],
            'misi'       => ['type' => 'TEXT'],
            'nilai_inti' => ['type' => 'TEXT', 'null' => true],
            'sejarah'    => ['type' => 'TEXT', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tentang_kami', true);

        // 4. Tabel profil_perusahaan
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_perusahaan'   => ['type' => 'VARCHAR', 'constraint' => 180],
            'tagline'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'deskripsi_singkat' => ['type' => 'TEXT', 'null' => true],
            'alamat'            => ['type' => 'TEXT', 'null' => true],
            'email'             => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'telepon'           => ['type' => 'VARCHAR', 'constraint' => 40, 'null' => true],
            'website'           => ['type' => 'VARCHAR', 'constraint' => 180, 'null' => true],
            'jam_operasional'   => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'sosial_media'      => ['type' => 'TEXT', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profil_perusahaan', true);
    }

    public function down()
    {
        $this->forge->dropTable('profil_perusahaan', true);
        $this->forge->dropTable('tentang_kami', true);
        $this->forge->dropTable('gallery', true);
        $this->forge->dropTable('blog', true);
    }
}