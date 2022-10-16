<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bahasa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    =>[ 'type' => 'int','constraint'=>10,'unsigned'=>true, 'auto_increment'=>true],
            'kode'  =>[ 'type' => 'varchar','constraint'=>2,'null'=>true],
            'nama'  =>[ 'type' => 'varchar','constraint'=>50,'null'=>false],
            
        ]);
        $this->forge->addPrimarykey('id');
        $this->forge->createTable('bahasa');
    }

    public function down()
    {
        $this->forge->dropTable('bahasa');
    }
}
