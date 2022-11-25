<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PenerbitModel;
use CodeIgniter\Email\Email;
use Config\Email as ConfigEmail;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Message;

class PenerbitController extends BaseController
{
    public function index()
    {
        return view('backend/Penerbit/table');
    }

    public function all()
    {
        $pm = new PenerbitModel();
        $pm->select('id, nama, kota, negara,');

        return (new Datatable($pm))
            ->setFieldFilter(['nama', 'kota', 'negara'])
            ->draw();
    }
    public function show($id){
        $r = (new PenerbitModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();
        return $this->response->setJSON($r);
    }

    public function store(){
        $pm = new PenerbitModel();
        $id = $pm->insert([
                'nama'      => $this->request->getVar('nama'),
                'kota'      => $this->request->getVar('kota'),
                'negara'    => $this->request->getVar('negara'),
        ]);
        return $this->response->setJSON(['id' => $id])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406 );
    }

    public function update(){
        $pm     = new PenerbitModel();
        $id     =(int)$this->request->getVar('id');
        if( $pm->find($id) == null)
            throw PageNotFoundException::forPageNotFound();
            
         $hasil = $pm->update($id, [
            'nama'      => $this->request->getVar('nama'),
            'kota'      => $this->request->getVar('kota'),
            'negara'    => $this->request->getVar('negara'),
         ]);
         return $this->response->setJSON(['result'=>$hasil]);   
            
    }

    public function delete(){
        $pm     = new PenerbitModel();
        $id     = $this->request->getVar('id');
        $hasil  = $pm->delete($id);
        return $this->response->setJSON(['result' => $hasil ]);
    }
}
