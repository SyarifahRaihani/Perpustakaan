<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    =>[ 'type' => 'int', 'constraint' => 10, 'unsigned'=>true, 'auto_increment'=>true ],
            'nama'  =>[ 'type' => 'varchar', 'constraint'=> 30, 'null'=>false ]

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
