<?php

namespace App\Database\Seeds;

use App\Models\TransaksiModel;
use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $id = (new TransaksiModel())->insert([
            'tgl_pinjam'        =>'2022-10-20',
            'tgl_harus_kembali' => '2022-10-23',
            #'anggota_id'        =>'',
            #'stok_koleksi_id'   =>'',
            #'pustakawan_id'     =>'',
            'kembali_pustakawan_id' =>'2022-10-23',
            'denda'             =>'0',
            'status_trx'        =>'P',
            'catatan'           =>'ok',

        ]);
    }
}
