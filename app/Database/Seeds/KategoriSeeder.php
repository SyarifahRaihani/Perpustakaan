<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\KategoriModel;
class KategoriSeeder extends Seeder
{
    public function run()
    {
        $id =(new KategoriModel())->insertBatch([
            ['nama'=>'Surat Masuk'],
            ['nama'=>'Surat Keluar'],
            ['nama'=>'Dokumen Rahasia'],
        ]);
    }
}
