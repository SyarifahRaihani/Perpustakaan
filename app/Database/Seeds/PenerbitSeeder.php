<?php

namespace App\Database\Seeds;

use App\Models\PenerbitModel;
use CodeIgniter\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new PenerbitModel())->insert([
            'nama'   => 'SalehGaming',
            'kota'   => 'Pontianak',
            'negara' => 'Indonesia',
        ]);
        echo "hasil insert $r";
    }
}
