<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                =>[ 'type' => 'int', 'constraint' => 10, 'null' => true, 'unsigned'=>true, 'auto_increment'=>true ],
            'tgl_pinjam'        =>[ 'type' => 'date', 'null'=>true],
            'tgl_harus_kembali' =>[ 'type' => 'date', 'null'=>true],
            'anggota_id'        =>[ 'type' => 'int', 'constraint' => 10, 'null' => true, 'unsigned'=>true ],
            'stokkoleksi_id'   =>[ 'type' => 'int', 'constraint' => 10, 'null' => true,'unsigned'=>true ],
            'pustakawan_id'     =>[ 'type' => 'int', 'constraint' => 10, 'null' => true,'unsigned'=>true ],
            'kembali_pustakawan_id'        =>[ 'type' => 'int', 'constraint' => 10, 'null' => true, 'unsigned'=>true, ],
            'denda'             =>[ 'type' => 'double', 'default' => '0',],
            'status_trx'        =>[ 'type' => 'enum("P", "K", "R", "H")', 'default'=>'P' ],
            'catatan'           =>[ 'type' => 'text' ],
            'created_at'        =>[ 'type' => 'datetime', 'null'=>true],
            'updated_at'        =>[ 'type' => 'datetime', 'null'=>true],
            'deleted_at'        =>[ 'type' => 'datetime', 'null'=>true]
        ]);
        
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('anggota_id', 'anggota', 'id', 'cascade');
        $this->forge->addForeignKey('stokkoleksi_id', 'stokkoleksi', 'id', 'cascade');
        $this->forge->addForeignKey('pustakawan_id', 'pustakawan', 'id', 'cascade');
        $this->forge->addForeignKey('kembali_pustakawan_id', 'pustakawan', 'id', 'cascade');
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
