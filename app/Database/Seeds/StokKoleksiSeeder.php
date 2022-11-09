<?php

namespace App\Database\Seeds;

use App\Models\KoleksiModel;
use App\Models\StokKoleksiModel;
use CodeIgniter\Database\Seeder;

class StokKoleksiSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new StokKoleksiModel())->insert([
            'koleksi_id'        => 1,
            'nomor'             => '1',
            'status_tersedia'   => 'A',
            'anggota_id'       => 1,
            'pustakawan_id'    => 1,
        ]);
        echo "hasil insert $r";
    }
}
