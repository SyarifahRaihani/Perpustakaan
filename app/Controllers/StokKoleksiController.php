<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\StokKoleksi;
use App\Models\StokKoleksiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class StokKoleksiController extends BaseController
{
    public function index(){
        return view('StokKoleksi/table');
    }
    public function all(){
        $pm =new StokKoleksiModel();
        $pm->select('id, koleksi_id, nomor, status_tersedia, anggota_id, pustakawan_id, created_id, updated_at, deleted_at');

        return (new Datatable( $pm ))
                ->setFieldFilter(['koleksi_id', 'nomor', 'status_tersedia', 'anggota_id', 'pustakawan_id', 'created_id', 'updated_at', 'deleted_at'])
                ->draw();
    }
    public function show($id){
        $pm = (new StokKoleksiModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r):
    }
    public function store(){
        $pm     = new StokKoleksiModel();

        $id = $pm->insert([
            'koleksi_id'  => $this->request->getVar('koleksi_id'),
            'nomor'  => $this->request->getVar('nomor'),
            'status_tersedia'  => $this->request->getVar('status_tersedia'),
            'anggota_id'  => $this->request->getVar('anggota_id'),
            'pustakawan'  => $this->request->getVar('pustakawan_id'),
            'created_at'  => $this->request->getVar('created_at'),
            'update_at'  => $this->request->getVar('updated_at'),
            'deleted_at'  => $this->request->getVar('deleted_at'),
        ]);
        return $this->response->setJSON(['id => $id'])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406);
    }
    public function update(){
        $pm     = new PemesananModel();
        $id     = (int)$this->request->getVar('id');

        if( $pm->find($id) == null )
            throw PageNotFoundException::forMethodNotFound();
            
        $hasil  = $pm->update($id, [
            'koleksi_id'  => $this->request->getVar('koleksi_id'),
            'nomor'  => $this->request->getVar('nomor'),
            'status_tersedia'  => $this->request->getVar('status_tersedia'),
            'anggota_id'  => $this->request->getVar('anggota_id'),
            'pustakawan_id'  => $this->request->getVar('pustakawan_id'),
            'created_at'  => $this->request->getVar('created_at'),
            'updated_at'  => $this->request->getVar('update_at'),
            'deleted_at'  => $this->request->getVar('deleted_at'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
        
    }
    
    public function delete(){
        $pm     = new StokKoleksiModel();
        $id     = $this->request->getVar('id');
        $hasil  = $pm->delete($id);
        return $this->response->setJSON(['result' => $hasil ]);
    }

}
