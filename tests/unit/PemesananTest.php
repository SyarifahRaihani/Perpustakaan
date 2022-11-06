<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class PemesamanTest extends CIUnitTestCase{

    use FeatureTestTrait;

    public function testLogin(){
        $this->call('post', 'login',[
            'tgl_akhir'     => '',
            'koleksi_id'    => '',
            'anggota_id'    => '',
            'status_pesan'  => '',
            'created_at'    => '',
            'update_at'     => '',
            'deleted_at'    => ''
        ])->assertStatus(200);
    }

    
    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'Pemesanan  ',[
            'tgl_akhir'     => '',
            'koleksi_id'    => '',
            'anggota_id'    => '',
            'status_pesan'  => '',
            'created_at'    => '',
            'update_at'     => '',
            'deleted_at'    => ''
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Pemesanan/".$js['id'])
                ->assertStatus(200);

        $this->call('patch', 'Pemesanan',[
            'ddc'   => 'Testing pemesanan update',
            'nama'  => 'karya umum',
            'id'    => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'pemesanan',[
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    public function testRead(){
        $this->call('get', 'pemesanan/all')
                ->assertStatus(200);
    }

    public function testLogout(){
    $this->call('delete', 'login')
            ->assertStatus(302);
    }

}