<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PenerbitModel;
use App\Models\PenggunaModel;
use CodeIgniter\Email\Email;
use Config\Email as ConfigEmail;

class PenerbitController extends BaseController
{
    public function index()
    {
        return view('Pengguna/table');
    }

    public function all()
    {
        $pm = new PenerbitModel();
        $pm->select('id, nama, kota, negara,');

        return (new Datatable($pm))
            ->setFieldFilter(['nama', 'kota', 'negara'])
            ->draw();
    }
}
