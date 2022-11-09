<?php

namespace App\Database\Seeds;

use App\Models\KategoriModel;
use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new KategoriModel())->insert([
            'nama' => 'Majalah',

        ]);
        echo "hasil insert $r";
    }
}
