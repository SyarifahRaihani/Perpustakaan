<?php

namespace App\Database\Seeds;

use App\Models\AnggotaModel;
use CodeIgniter\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new AnggotaModel())->insert([
            'nama_depan'        => 'Syarifah',
            'nama_belakang'     => 'Raihani',
            'email'             => 'syfraihanihinduan@gmail.com',
            'nohp'              => '085849999627',
            'alamat'            => 'Jl Tanjung Raya 2',
            'kota'              => 'Pontianak',
            'gender'            => 'P',
            'foto'              => '',
            'tgl_daftar'        => '2022-10-13',
            'status_aktif'      => 'A',
            'berlaku_awal'      => '2022-10-13',
            'berlaku_akhir'     => '2023-10-14',
        ]);
        echo "hasil insert $r";
    }
}
