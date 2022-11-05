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
            'koleksi_id'        => '',
            'nomor'             => '',
            'status_tersedia'   => '',
            'anggota_id'        => '',
            'pustakawan_id'     => '',
            'created_at'        => '',
            'updated_at'        => '',
            'deleted_at'        => ''
        ])->assertStatus(200);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'StokKoleksi',[
            'koleksi_id'        => '',
            'nomor'             => '',
            'status_tersedia'   => '',
            'anggota_id'        => '',
            'pustakawan_id'     => '',
            'created_at'        => '',
            'updated_at'        => '',
            'deleted_at'        => ''
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "StokKoleksi/".$js['id'])
                ->assertStatus(200);

        $this->call('patch', 'StokKoleksi',[
            
            'id'    => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'StokKoleksi',[
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    
    public function testRead(){
        $this->call('get', 'StokKoleksi/all')
                ->assertStatus(200);
    }

    public function testLogout(){
    $this->call('delete', 'login')
            ->assertStatus(302);
    }

}