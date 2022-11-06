<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class KlasifikasiTest extends CIUnitTestCase{

    use FeatureTestTrait;

    public function testLogin(){
        $this->call('post', 'login',[
            'ddc'   => '000-099',
            'nama'  => 'karya umum'
        ])->assertStatus(200);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'Klasifikasi',[
            'ddc'   => 'Testing ddc',
            'nama'  => 'karya umum'
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Klasifikasi/".$js['id'])
                ->assertStatus(200);

        $this->call('patch', 'Klasifikasi',[
            'ddc'   => 'Testing klasifikasi update',
            'nama'  => 'karya umum',
            'id'    => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'klasifikasi',[
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    
    public function testRead(){
        $this->call('get', 'klasifikasi/all')
                ->assertStatus(200);
    }

    public function testLogout(){
    $this->call('delete', 'login')
            ->assertStatus(302);
    }

}