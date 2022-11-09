<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\StokKoleksiModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Message;

class StokKoleksiController extends BaseController
{
    public function index(){
        return view('StokKoleksi/table');
    }
    public function all(){
        $pm =new StokKoleksiModel();
        $pm->select('id, koleksi_id, nomor, status_tersedia, anggota_id, pustakawan_id, ');

        return (new Datatable( $pm ))
                ->setFieldFilter(['koleksi_id', 'nomor', 'status_tersedia', 'anggota_id', 'pustakawan_id' ])
                ->draw();
    }
    public function show($id){
        $r = (new StokKoleksiModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $pm     = new StokKoleksiModel();

        $id = $pm->insert([
            'koleksi_id'        => $this->request->getVar('koleksi_id'),
            'nomor'             => $this->request->getVar('nomor'),
            'status_tersedia'   => $this->request->getVar('status_tersedia'),
            'anggota_id'        => $this->request->getVar('anggota_id'),
            'pustakawan_id'        => $this->request->getVar('pustakawan_id'),
        ]);
        return $this->response->setJSON(['id => $id'])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406);
    }
    public function update(){
        $pm     =new StokKoleksiModel();
        $id     = (int)$this->request->getVar('id');

        if( $pm->find($id) == null )
            throw PageNotFoundException::forPageNotFound();
            
        $hasil  = $pm->update($id, [
            'koleksi_id'        => $this->request->getVar('koleksi_id'),
            'nomor'             => $this->request->getVar('nomor'),
            'status_tersedia'   => $this->request->getVar('status_tersedia'),
            'anggota_id'        => $this->request->getVar('anggota_id'),
            'pustakawan_id'     => $this->request->getVar('pustakawan_id'),
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
