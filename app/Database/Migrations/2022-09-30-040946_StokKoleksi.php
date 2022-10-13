<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokKoleksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                =>[ 'type' => 'int', 'constraint' => 10, 'unsigned'=>true, 'auto_increment'=>true ],
            'koleksi_id'        =>[ 'type' => 'int', 'constraint' => 10, ],
            'nomor'             =>[ 'type' => 'int', 'constraint' => 10, 'default' => '1' ],
            'status_tersedia'   =>[ 'type' => 'enum("A", "P", "R", "H")', 'default' => 'A' ],
            'anggota_id'        =>[ 'type' => 'int', 'constraint' => 10, 'unsigned'=>true, 'auto_increment'=>true ],
            'pustakawan_id'     =>[ 'type' => 'int', 'constraint' => 10, 'unsigned'=>true, 'auto_increment'=>true ],
            'created_at'        =>[ 'type' => 'datetime', 'null'=>true],
            'updated_at'        =>[ 'type' => 'datetime', 'null'=>true],
            'deleted_at'        =>[ 'type' => 'datetime', 'null'=>true]
        ]);
        
        $this->forge->addForeignKey('koleksi_id', 'koleksi', 'id', 'cascade', 'set null');
        $this->forge->addForeignKey('anggota_id', 'anggota', 'id', 'cascade', 'set null');
        $this->forge->addForeignKey('pustakawan_id', 'pustakawan', 'id', 'cascade', 'set null');
        $this->forge->createTable('stok_koleksi');
    }

    public function down()
    {
        $this->forge->dropTable('stok_koleksi');
    }
}
