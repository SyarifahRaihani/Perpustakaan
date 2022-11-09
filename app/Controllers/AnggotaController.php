<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Message;

class AnggotaController extends BaseController
{
    public function index()
    {
        return view('Anggota/table');
    }

    public function all(){
        $pm = new AnggotaModel();
        $pm->select('id, nama_depan, nama_belakang, email, nohp, alamat, kota, gender, tgl_daftar, status_aktif, berlaku_awal, berlaku_akhir');

        return (new Datatable( $pm))
                ->setFieldFilter(['nama_depan', 'nama_belakang', 'email', 'nohp', 'alamat', 'kota', 'gender', 'tgl_daftar', 'status_aktif', 'berlaku_awal', 'berlaku_akhir'])
                ->draw();
    }

    public function show($id){
        $r = (new AnggotaModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }

    public function store(){
        $pm     = new AnggotaModel();

        $id = $pm->insert([
            'nama_depan'    => $this->request->getVar('nama_depan'),
            'nama_belakang' => $this->request->getVar('nama_belakang'),
            'email'         => $this->request->getVar('email'),
            'nohp'          => $this->request->getVar('nohp'),
            'alamat'        => $this->request->getVar('alamat'),
            'gender'        => $this->request->getVar('gender'),
            'tgl_daftar'    => $this->request->getVar('tgl_daftar'),
            'status_aktif'  => $this->request->getVar('status_aktif'),
            'berlaku_awal'  => $this->request->getVar('berlaku_awal'),
            'berlaku_akhir' => $this->request->getVar('berlaku_akhir'),
        ]);
        return $this->response->setJSON(['id' => $id])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406 );
    }

    public function update(){
        $pm     = new AnggotaModel();
        $id     =(int)$this->request->getVar('id');

        if( $pm->find($id) == null )
            throw PageNotFoundException::forPageNotFound();
        $hasil  = $pm->update($id, [
            'nama_depan'    => $this->request->getVar('nama_depan'),
            'nama_belakang' => $this->request->getVar('nama_belakang'),
            'email'         => $this->request->getVar('email'),
            'nohp'          => $this->request->getVar('nohp'),
            'alamat'        => $this->request->getVar('alamat'),
            'gender'        => $this->request->getVar('gender'),
            'tgl_daftar'    => $this->request->getVar('tgl_daftar'),
            'status_aktif'  => $this->request->getVar('status_aktif'),
            'berlaku_awal'  => $this->request->getVar('berlaku_awal'),
            'berlaku_akhir' => $this->request->getVar('berlaku_akhir'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }

    public function delete(){
        $pm     = new AnggotaModel();
        $id     = $this->request->getVar('id');
        $hasil  = $pm->delete($id);
        return $this->response->setJSON(['result' => $hasil ]);
    }
}
