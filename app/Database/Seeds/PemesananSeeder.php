<?php

namespace App\Database\Seeds;

use App\models\PemesananModel;
use CodeIgniter\Database\Seeder;

class PemesananSeeder extends Seeder
{
    public function run()
    {
        $r =(int)(new PemesananModel())->insert([
            'tgl_awal'      => '2022-10-15',
            'tgl_akhir'     => '2022-10-30',
            'koleksi_id'    => '1',
            'anggota_id'    => '2',
            'status_pesan'  => 'B',
        ]);
        
        echo "hasil insert $r";
    }
}
