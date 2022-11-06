<?php

namespace App\Database\Seeds;

use App\Models\KoleksiModel;
use CodeIgniter\Database\Seeder;

class StokKoleksiSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new KoleksiModel())->insert([
            'koleksi_id'        => '10',
            'nomor'             => '10',
            'status_tersedia'   => 'A',
            #'anggota_id'       => ,
            #'pustakawan_id'    => ,
        ]);
        echo "hasil insert $r";
    }
}
