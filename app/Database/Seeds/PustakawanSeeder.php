<?php

namespace App\Database\Seeds;

use App\Models\PustakawanModel;
use CodeIgniter\Database\Exceptions\DataException;
use CodeIgniter\Database\Seeder;

class PustakawanSeeder extends Seeder
{
    public function run()
    {
        $id = (new PustakawanModel())->insert([
            'nama_lengkap'      => 'Administrator',
            'gender'            => 'P',
            'tgl_lahir'         => '2001-06-19',
            'level'             => 'P',
            'email'             =>'syfraihanihinduan@gmail.com',
            'sandi'             => password_hash('123456', PASSWORD_BCRYPT),
            'nohp'              => '085849999627',
            'alamat'            => 'Jl Tanray 2',
            'kota'              => 'Pontianak',
            'token_reset'       => '1234567890',
        ]);
        echo "hasil id = $id";
    }
}
