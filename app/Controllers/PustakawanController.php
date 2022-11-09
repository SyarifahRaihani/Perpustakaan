<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PustakawanModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Message;
use Config\Email as ConfigEmail;

class PustakawanController extends BaseController
{
    public function login()
    {
        $email      = $this->request->getPost('email');
        $password   = $this->request->getPost('sandi');

        $pustakawan   = (new PustakawanModel())->where('email', $email)->first();
        
        if($pustakawan == null){
            return $this->response->setJSON(['message'=>'Email tidak terdaftar'])
                        ->setStatusCode(404);
        }

        $cekPassword = password_verify($password, $pustakawan['sandi']);
        if($cekPassword == false){
            return $this->response->setJSON(['message'=>'Email dan Sandi tidak cocok'])
                        ->setStatusCode(403);
        }

        $this->session->set('pustakawan', $pustakawan);
        return $this->response->setJSON(['message'=>"Selamat datang {$pustakawan['nama_lengkap']} "])
                    ->setStatusCode(200);
    }
   
    public function viewLogin(){
        return view('login');
    }

    public function lupaPassword()
    {
        $_email = $this->request->getPost('email');

        $pustakawan = (new PustakawanModel())->where('email', $_email)->first();
        

        if($pustakawan == null){
            return $this->response->setJSON(['message'=> 'Email tidak terdaftar'])
                        ->setStatusCode(404);
        }
    
        $sandibaru = substr(\md5( date('Y-m-dH:i:s')),5,5);
        $pustakawan['sandi'] = password_hash($sandibaru, PASSWORD_BCRYPT);
        $r = (new PustakawanModel())->update($pustakawan['id'], $pustakawan);

        if($r == false){
            return $this->response->setJSON(['message'=>'Gagal merubah sandi'])
                        ->setStatusCode(502);
        }
    
        $email = new Email(new ConfigEmail());
        $email->setFrom('syfraihanihinduan@gmail.com', 'Sistem Informasi Perpustakaan');
        $email->setTo($pustakawan['email']);
        $email->setSubject('Reset Sandi pustakawan');
        $email->setMessage("Hallo{$pustakawan['nama_lengkap']} telah meminta reset baru. Reset baru kamu adalah <b>$sandibaru</b>");
        $r = $email->send();

        if($r == true){
            return $this->response->setJSON(['message'=>"Sandi baru sudah di kirim ke alamat email $_email"])
                        ->setStatusCode(200);
        }else{
            return $this->response->setJSON(['message'=>"Maaf ada kesalahan pengiriman email ke $_email"])
                        ->setStatusCode(500);
        }
    }

    public function viewLupaPassword()
    {
            return view('lupa_password');
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('login');
    }

    public function index(){
        return view('Pustakawan1/table');
    }

    public function all(){
        $pm = new PustakawanModel();
        $pm->select('id, nama_lengkap, gender, tgl_lahir, level, email, nohp, alamat, kota, token_reset');

        return (new Datatable( $pm ))
                ->setFieldFilter(['nama_lengkap', 'gender', 'tgl_lahir', 'level', 'email', 'nohp', 'alamat', 'kota', 'token_reset'])
                ->draw();
    }

    public function show($id){
        $r = (new PustakawanModel())->where('id', $id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }

    public function store(){
        $pm     = new PustakawanModel();
        $sandi  = $this->request->getVar('sandi');

        $id = $pm->insert([
            'nama_lengkap'      => $this->request->getVar('nama_lengkap'),
            'gender'            => $this->request->getVar('gender'),
            'tgl_lahir'         => $this->request->getVar('tgl_lahir'),
            'level'             => $this->request->getVar('level'),
            'email'             => $this->request->getVar('email'),
            'sandi'             =>password_hash($sandi, PASSWORD_BCRYPT),
            'nohp'              => $this->request->getVar('nohp'),
            'alamat'            => $this->request->getVar('alamat'),
            'kota'              => $this->request->getVar('kota'),
            'token_reset'       => $this->request->getVar('token_reset'),
        ]);
        return $this->response->setJSON(['id' => $id])
                    ->setStatusCode( intval($id) > 0 ? 200 : 406 );
    }

    public function update(){
        $pm     = new PustakawanModel();
        $id     =(int)$this->request->getVar('id');

        if( $pm->find($id) == null )
            throw PageNotFoundException::forPageNotFound();

        $hasil  = $pm->update($id, [
            'nama_lengkap'      => $this->request->getVar('nama_lengkap'),
            'gender'            => $this->request->getVar('gender'),
            'tgl_lahir'         => $this->request->getVar('tgl_lahir'),
            'level'             => $this->request->getVar('level'),
            'email'             => $this->request->getVar('email'),
            'nohp'              => $this->request->getVar('nohp'),
            'alamat'            => $this->request->getVar('alamat'),
            'kota'              => $this->request->getVar('kota'),
            'token_reset'       => $this->request->getVar('token_reset'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }

    public function delete(){
        $pm     = new PustakawanModel();
        $id     = $this->request->getVar('id');
        $hasil  = $pm->delete($id);
        return $this->response->setJSON(['result' => $hasil ]);
    }
}
