<?php

namespace App\Database\Seeds;

use App\Models\KlasifikasiModel;
use CodeIgniter\Database\Seeder;

class KlasifikasiSeeder extends Seeder
{
    public function run()
    {
            $r = (int)(new KlasifikasiModel())->insert([
                'ddc'   => '000-099',
                'nama'  => 'Karya Umum'
            ]);

            echo "hasil insert $r";
    }
}
