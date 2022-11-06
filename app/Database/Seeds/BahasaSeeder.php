<?php

namespace App\Database\Seeds;

Use App\Models\BahasaModel;
use CodeIgniter\Database\Seeder;

class BahasaSeeder extends Seeder
{
    public function run()
    {
        $id = (new BahasaModel())->insert([
            'kode' => 'id',
            'nama' => 'Indo',
            
        ]);
        echo "hasil id = $id";
    }
}
