<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PemesananModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Message;


class PemesananController extends BaseController
{
    public function index(){
        return view('Pemesanan/table');
    }

    public function all(){
        $pm = new PemesananModel();
        $pm->select('id, tgl_awal, tgl_akhir, koleksi_id, anggota_id, status_pesan');

        return (new Datatable( $pm ))
                ->setFieldFilter(['tgl_awal', 'tgl_akhir', 'koleksi_id', 'anggota_id', 'status_pesan'])
                ->draw();
    }

    public function show($id){
        $r = (new PemesananModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }

    public function store(){
        $pm     = new PemesananModel();

        $id = $pm->insert([
            'tgl_awal'      => $this->request->getVar('tgl_awal'),
            'tgl_akhir'     => $this->request->getVar('tgl_akhir'),
            'koleksi_id'    => $this->request->getVar('koleksi_id'),
            'anggota_id'    => $this->request->getVar('anggota_id'),
            'status_pesan'  => $this->request->getVar('status_pesan'),
        ]);
        return $this->response->setJSON(['id' => $id])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406);
    }

    public function update(){
        $pm     = new PemesananModel();
        $id     = (int)$this->request->getVar('id');

        if( $pm->find($id) == null )
            throw PageNotFoundException::forPageNotFound();
            
        $hasil  = $pm->update($id, [
            'tgl_awal'      => $this->request->getVar('tgl_awal'),
            'tgl_akhir'     => $this->request->getVar('tgl_akhir'),
            'koleksi_id'    => $this->request->getVar('koleksi_id'),
            'anggota_id'    => $this->request->getVar('anggota_id'),
            'status_pesan'  => $this->request->getVar('status_pesan'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);    
    }

    public function delete(){
        $pm     = new PemesananModel();
        $id     = $this->request->getVar('id');
        $hasil  = $pm->delete($id);
        return $this->response->setJSON(['result' => $hasil ]);
    }

}
