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
            'kode'        => '',
            'nama'        => '',
        ])->assertStatus(200);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'Bahasa',[
            'kode'        => '',
            'nama'        => '',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Bahasa/".$js['id'])
                ->assertStatus(200);

        $this->call('patch', 'Bahasa',[
            
            'id'    => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Bahasa',[
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    
    public function testRead(){
        $this->call('get', 'Bahasa/all')
                ->assertStatus(200);
    }

    public function testLogout(){
    $this->call('delete', 'login')
            ->assertStatus(302);
    }

}