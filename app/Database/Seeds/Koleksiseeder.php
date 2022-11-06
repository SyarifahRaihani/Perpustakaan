<?php

namespace App\Database\Seeds;

use App\Models\KoleksiModel;
use CodeIgniter\Database\Seeder;

class KoleksiSeeder extends Seeder
{
    public function run()
    {
        $r = (int)(new KoleksiModel())->insert([
            'judul'             => 'saleh ga',
            'jilid'             => '2',
            'edisi'             => '4',
            'penerbit_id'       => '1',
            'penulis'           => 'Saleh',
            'thn_terbit'      => '2020',
            #'klasifikasi_id'    => '',
            'juml_halaman'      => '200',
            #'isbn'              => ,
            #'bahasa_id'         => ,
            'stok'              => '100',
            'eksemplar'         => '100',
            #'kategori_id'       => ,
            #'pustakawan_id'     => ,

        ]);
        echo "hasil insert $r";
    }
}
