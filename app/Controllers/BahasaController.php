<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BahasaController extends BaseController
{
    public function login()
    {
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('sandi');

        $pengguna   = (new PenggunaModel())->where('email', $email)->first();

        if($pengguna == null){
            return $this->response->setJSON(['message'='Email tidak terdaftar'])
        }
    }
}
