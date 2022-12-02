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
            'nama'        => '',
        ])->assertStatus(200);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'Kategori',[
            'nama'        => '',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Kategori/".$js['id'])
                ->assertStatus(200);

        $this->call('patch', 'Kategori',[
            
            'id'    => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Kategori',[
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    
    public function testRead(){
        $this->call('get', 'Kategori/all')
                ->assertStatus(200);
    }

    public function testLogout(){
    $this->call('delete', 'login')
            ->assertStatus(302);
    }

}