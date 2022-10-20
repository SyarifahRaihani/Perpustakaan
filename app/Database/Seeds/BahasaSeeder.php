<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BahasaSeeder extends Seeder
{
    public function run()
    {
        $id = (new BahasaModel())->insert([
            'nama' => 'Be',
            'gender' => 'L',
            'email' => 'dioadika6@gmail.com'
            'sandi' => password_hash('123', PASSWORD_BCRYPT)
        ]);
        echo "hasil id = $id";
    }
}
