<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pustakawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [ 'type' => 'int', 'constraint' => 10, 'unsigned'=>true, 'auto_increment'=>true ],
            'nama_lengkap'  => [ 'type' => 'varchar', 'constraint'=> 80, 'null'=>false ],
            'gender'        => [ 'type' => 'enum("L", "P")', 'null'=>true ],
            'tgl_lahir'     => [ 'type' => 'date', 'null'=>true ],
            'level'         => [ 'type' => 'enum("P", "K")', 'null'=>true ],
            'email'         => [ 'type' => 'varchar', 'constraint'=> 255, 'null'=>true ],
            'sandi'         => [ 'type' => 'varchar', 'constraint'=> 60, 'null'=>true ],
            'nohp'          => [ 'type' => 'varchar', 'constraint'=> 15 ],
            'alamat'        => [ 'type' => 'varchar', 'constraint'=> 255 ],
            'kota'          => [ 'type' => 'varchar', 'constraint'=> 30 ],
            'token_reset'   => [ 'type' => 'varchar', 'constraint'=> 10 ],
            'created_at'    => [ 'type' => 'datetime', 'null'=>true ],
            'updated_at'    => [ 'type' => 'datetime', 'null'=>true ],
            'deleted_at'    => [ 'type' => 'datetime', 'null'=>true ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('pustakawan');
    }

    public function down()
    {
        $this->forge->dropTable('pustakawan');
    }
}
