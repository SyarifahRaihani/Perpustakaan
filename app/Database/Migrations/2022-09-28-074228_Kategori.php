<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Migrations;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addfield([
            'id'    =>[ 'type' => 'int','constraint' => 10,'unsigned'=>true, 'auto_increment'=>true],
            'nama'  =>[ 'type' => 'varchar','constraint' => 30,'null'=>false ]
        ]);
        $this->forge->addPrimarykey('id');
        $this->forge->createTable('kategori');
    }

    public function down()
    {
        $this->forge->dropTable('kategori');
    }
}
