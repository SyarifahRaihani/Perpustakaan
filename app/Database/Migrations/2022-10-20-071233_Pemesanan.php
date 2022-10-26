<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            =>[ 'type'=>'int','constraint'=> 10,'unsigned'=>true,'auto_increment'=>true ],           
            'tgl_awal'      =>[ 'type'=>'date','null'=>true ],
            'tgl_akhir'     =>[ 'type'=>'date','null'=>true ],
            'koleksi_id'    =>[ 'type'=>'int','constraint'=> 10,'unsigned'=>true ],
            'anggota_id'    =>[ 'type'=>'int','constraint'=> 10,'unsigned'=>true ],          
            'status_pesan'  =>[ 'type'=>'enum("B","O","X","H")' ],
            'created_at'    =>[ 'type'=>'datetime','null'=>true ],
            'update_at'     =>[ 'type'=>'datetime','null'=>true ],
            'deleted_at'    =>[ 'type'=>'datetime','null'=>true ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('koleksi_id', 'koleksi', 'id', 'cascade');
        $this->forge->addForeignKey('anggota_id', 'anggota', 'id', 'cascade');
        $this->forge->createTable('pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}
