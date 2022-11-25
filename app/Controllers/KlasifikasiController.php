<?php

namespace App\Controllers;


use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\KlasifikasiModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Message;

class KlasifikasiController extends BaseController
{
    public function index(){
        return view('backend/Klasifikasi/table');
    }

    public function all(){
        $pm = new KlasifikasiModel();
        $pm->select ('id, ddc, nama');

       return (new Datatable( $pm ))
                ->setFieldFilter(['ddc', 'nama'])
                ->draw();     
    }
    
    public function show($id){
        $r = (new KlasifikasiModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $pm = new KlasifikasiModel();

        $id = $pm->insert([
                'ddc'   => $this->request->getVar('ddc'),
                'nama'  => $this->request->getVar('nama'),
        ]);
        return $this->response->setJSON(['id' => $id])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406 );

    }
    public function update(){
        $pm     = new KlasifikasiModel();
        $id     =(int)$this->request->getVar('id');

        if( $pm->find($id) == null)
            throw PageNotFoundException::forPageNotFound();
            
         $hasil = $pm->update($id, [
            'ddc'   => $this->request->getVar('ddc'),
            'nama'  => $this->request->getVar('nama'),
         ]);
         return $this->response->setJSON(['result'=>$hasil]);   
            
    }
    public function delete(){
        $pm     = new KlasifikasiModel();
        $id     = $this->request->getVar('id');
        $hasil  = $pm->delete($id);
        return $this->response->setJSON(['result' => $hasil ]);
    }
}

