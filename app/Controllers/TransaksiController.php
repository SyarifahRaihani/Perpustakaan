<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
    public function index()
    {
    }

    public function all(){
    $spm = new TransaksiModel();
        $spm->select('nama','tgl_pinjam','Tgl_Harus kembali','anggota','stok_koleksi','pustakawan','denda','status');

        return(new($spm))
        ->setFieldFilter(['nama'])
        ->draw();
        
    }
}
