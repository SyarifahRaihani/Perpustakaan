<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\KoleksiModel;
use App\Models\PenggunaModel;
use CodeIgniter\Email\Email;
use Config\Email as ConfigEmail;

class KoleksiController extends BaseController
{
    public function index()
    {
    }

    public function all()
    {
        $pm = new KoleksiModel();
        $pm->select('id, judul, jilid, edisi, penerbit_id, penulis, thn_terbit, klasifikasi_id, juml_halaman, isbn, bahasa_id, stok, eksemplar, kategori_id, pustakawan_id');

        return (new Datatable($pm))
            ->setFieldFilter(['nama', 'email', 'gender'])
            ->draw();
    }
}
