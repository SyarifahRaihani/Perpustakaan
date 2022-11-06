<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perpustakaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            =>[ 'type' => 'int', 'auto_increment' => true ],
            'nama_depan'    =>[ 'type' => 'varchar', 'constraint' => 50, 'null'=>false ],
            'nama_belakang' =>[ 'type' => 'varchar', 'constraint' => 50, 'null'=>true ],
            'tgl_lahir'     =>[ 'type' => 'datetime', 'null'=>true],
            'gender'        =>[ 'type' => 'enum("L", "P")', 'default' => 'L' ],
            'password'      =>[ 'type' => 'varchar', 'constraint' => 32 ]
        ]);  
        $this->forge->addKey('id');
        $this->forge->createTable('perpustakaan');
    }

    public function down()
    {
        $this->forge->dropTable('perpustakaan');
    }
}
