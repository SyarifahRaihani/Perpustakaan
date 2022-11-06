<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    public function index(){
     
    }
    public function all(){
        $spm = new KategoriModel();
        $spm->select('nama');

        return(new($spm))
        ->setFieldFilter(['nama'])
        ->draw();
    }
}
