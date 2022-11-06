<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class Koleksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
            'judul'         => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'jilid'         => ['type' => 'varchar', 'constraint' => 20],
            'edisi'         => ['type' => 'varchar', 'constraint' => 80],
            'penerbit_id'   => ['type' => 'int', 'constraint' => 10, 'unsigned' => true,],
            'penulis'       => ['type' => 'varchar', 'constraint' => 155],
            'thn_terbt'     => ['type' => 'year', 'constraint' => 4],
            'klasifikasi_id' => ['type' => 'int', 'constraint' => 10, 'unsigned' => true,],
            'jenis_id'      => ['type' => 'int', 'constraint' => 10, 'unsigned' => true,],
            'juml_halaman'  => ['type' => 'varchar', 'constraint' => 10],
            'isbn'          => ['type' => 'varchar', 'constraint' => 20],
            'bahasa_id'     => ['type' => 'int', 'constraint' => 10, 'unsigned' => true,],
            'stok'          => ['type' => 'int', 'constraint' => 10],
            'eksemplar'     => ['type' => 'int', 'constraint' => 10],
            'kategori_id'   => ['type' => 'int', 'constraint' => 10, 'unsigned' => true,],
            'pustakawan_id' => ['type' => 'int', 'constraint' => 10, 'unsigned' => true,],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('penerbit_id', 'penerbit', 'id', 'cascade');
        $this->forge->addForeignKey('klasifikasi_id', 'klasifikasi', 'id', 'cascade');
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id', 'cascade');
        $this->forge->addForeignKey('bahasa_id', 'bahasa', 'id', 'cascade');
        $this->forge->addForeignKey('pustakawan_id', 'pustakawan', 'id', 'cascade');
        $this->forge->createTable('koleksi');
    }

    public function down()
    {
        $this->forge->dropTable('koleksi');
    }
}
