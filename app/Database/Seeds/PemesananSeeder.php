<?php

namespace App\Database\Seeds;

use App\models\PemesananModel;
use CodeIgniter\Database\Seeder;

class PemesananSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new PemesananModel())->insert([
            'tgl_awal'      => '15-10-2022',
            'tgl_akhir'     => '30-10-2022',
            #'koleksi_id'    => '',
            #'anggota_id'   => ,
            'status_pesan'  => 'B',
        ]);

        echo "hasil insert $r";
    }
}
