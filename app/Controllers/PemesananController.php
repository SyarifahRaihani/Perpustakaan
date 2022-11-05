<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PemesananModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use PhpParser\Node\Stmt\Return_;

class PemesananController extends BaseController
{
    public function index(){
        return view('Pemesanan/table');
    }
    public function all(){
        $pm = new PemesananModel();
        $pm->select('id, tgl_awal, tgl_akhir, koleksi_id, anggota_id, status_pesan, created_at, update_at, deleted_at');

        return (new DataTable( $pm ))
                ->setFieldFilter(['tgl_awal', 'tgl_akhir', 'koleksi_id', 'anggota_id', 'status_pesan', 'created_at', 'update_at', 'deleted_at'])
                ->draw();
    }
    public function show($id){
        $pm = (new PemesananModel())->where('id, $id')->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $pm     = new PemesananModel();

        $id = $pm->insert([
            'tgl_awal'  => $this->request->getVar('tgl_awal'),
            'tgl_akhir'  => $this->request->getVar('tgl_akhir'),
            'koleksi_id'  => $this->request->getVar('koleksi_id'),
            'anggota_id'  => $this->request->getVar('anggota_id'),
            'status_pesan'  => $this->request->getVar('status_pesan'),
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
            'tgl_awal'  => $this->request->getVar('tgl_awal'),
            'tgl_akhir'  => $this->request->getVar('tgl_akhir'),
            'koleksi_id'  => $this->request->getVar('koleksi_id'),
            'anggota_id'  => $this->request->getVar('anggota_id'),
            'status_pesan'  => $this->request->getVar('status_pesan'),
            'created_at'  => $this->request->getVar('created_at'),
            'updated_at'  => $this->request->getVar('update_at'),
            'deleted_at'  => $this->request->getVar('deleted_at'),
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
