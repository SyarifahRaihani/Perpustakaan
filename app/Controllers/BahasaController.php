<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahasaModel;

class BahasaController extends BaseController
{
    public function index(){
        return view('Bahasa/table');
    }
    public function all(){
        $spm = new BahasaModel();
        $spm->select('id,kode,nama,');

        return (new ($spm))
        ->setFieldFilter(['id,kode,nama'])
        ->draw();
    }
}
