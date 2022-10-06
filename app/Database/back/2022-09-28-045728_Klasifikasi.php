<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\MySQLi\Forge;

class Klasifikasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    =>[ 'type' => 'int', 'constraint' => 10, 'unsigned'=>true, 'auto_increment'=>true ],
            'ddc'   =>[ 'type' => 'varchar', 'constraint'=> 12, 'null'=>true ],
            'nama'  =>[ 'type' => 'varchar', 'constraint'=> 50, 'null'=>false ]

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('klasifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('klasifikasi');
    }
}
