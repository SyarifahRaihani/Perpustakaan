<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Message;

class TransaksiController extends BaseController
{
    public function index()
    {
        return view('Transaksi/table');
    }

    public function all(){
        $pm = new TransaksiModel();
        $pm->select ('id, tgl_pinjam, tgl_harus_kembali, anggota_id, stokkoleksi_id, pustakawan_id, kembali_pustakawan_id, denda, status_trx, catatan');
       return (new Datatable( $pm ))
                ->setFieldFilter(['tgl_pinjam', 'tgl_harus_kembali', 'anggota_id', 'stokkoleksi_id', 'pustakawan_id', 'kembali_pustakawan_id', 'denda', 'status_trx', 'catatan'])
                ->draw();     
    }
    
    public function show($id){
        $r = (new TransaksiModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();
        return $this->response->setJSON($r);
    }
    public function store(){
        $pm = new TransaksiModel();
        $id = $pm->insert([
                'tgl_pinjam'            => $this->request->getVar('tgl_pinjam'),
                'tgl_harus_kembali'     => $this->request->getVar('tgl_harus_kembali'),
                'anggota_id'            => $this->request->getVar('anggota_id'),
                'stokkoleksi_id'        => $this->request->getVar('stokkoleksi_id'),
                'pustakawan_id'         => $this->request->getVar('pustakawan_id'),
                'kembali_pustakawan_id' => $this->request->getVar('kembali_pustakawan_id'),
                'denda'                 => $this->request->getVar('denda'),
                'status_trx'            => $this->request->getVar('status_trx'),
                'catatan'               => $this->request->getVar('catatan'),

        ]);
        return $this->response->setJSON(['id' => $id])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406 );
    }
    public function update(){
        $pm     = new TransaksiModel();
        $id     =(int)$this->request->getVar('id');
        if( $pm->find($id) == null)
            throw PageNotFoundException::forPageNotFound();
            
         $hasil = $pm->update($id, [
            'tgl_pinjam'            => $this->request->getVar('tgl_pinjam'),
            'tgl_harus_kembali'     => $this->request->getVar('tgl_harus_kembali'),
            'anggota_id'            => $this->request->getVar('anggota_id'),
            'stokkoleksi_id'        => $this->request->getVar('stokkoleksi_id'),
            'pustakawan_id'         => $this->request->getVar('pustakawan_id'),
            'kembali_pustakawan_id' => $this->request->getVar('kembali_pustakawan_id'),
            'denda'                 => $this->request->getVar('denda'),
            'status_trx'            => $this->request->getVar('status_trx'),
            'catatan'               => $this->request->getVar('catatan'),
         ]);
         return $this->response->setJSON(['result'=>$hasil]);   
            
    }
    public function delete(){
        $pm     = new TransaksiModel();
        $id     = $this->request->getVar('id');
        $hasil  = $pm->delete($id);
        return $this->response->setJSON(['result' => $hasil ]);
    }
}
