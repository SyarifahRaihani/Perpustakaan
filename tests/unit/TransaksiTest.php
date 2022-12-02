<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class StokKoleksiTest extends CIUnitTestCase{

    use FeatureTestTrait;

    public function testLogin(){
        $this->call('post', 'login',[
            'tgl_pinjam'            => '',
            'anggota_id'            => '',
            'stokkoleksi_id'        => '',
            'pustakawan_id'         => '',
            'kembali_pustakawan_id' => '',
            'denda'                 => '',
            'status_trx'            => '',
            'catatan'               => '',
        ])->assertStatus(200);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'Transaksi',[
            'tgl_pinjam'            => '',
            'anggota_id'            => '',
            'stokkoleksi_id'        => '',
            'pustakawan_id'         => '',
            'kembali_pustakawan_id' => '',
            'denda'                 => '',
            'status_trx'            => '',
            'catatan'               => '',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Transaksi/".$js['id'])
                ->assertStatus(200);

        $this->call('patch', 'Transaksi',[
            
            'id'    => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Transaksi',[
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    
    public function testRead(){
        $this->call('get', 'Transaksi/all')
                ->assertStatus(200);
    }

    public function testLogout(){
    $this->call('delete', 'login')
            ->assertStatus(302);
    }

}