<?php

namespace App\Database\Seeds;

use App\Models\TransaksiModel;
use CodeIgniter\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $r =(int)(new TransaksiModel())->insert([
            'tgl_pinjam'            => '2022-10-15',
            'tgl_harus_kembali'     => '2022-10-30',
            'anggota_id'            => 1,
            'stokkoleksi_id'        => 1,
            'pustakawan_id'         => 1,
            'kembali_pustakawan_id' => 1,
            'denda'                 => '30000',
            'status_trx'            => 'R',
            'catatan'               => 'Buku ini sudah rusak',
        ]);
        
        echo "hasil insert $r";
    }
}
