<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class PustakawanTest extends CIUnitTestCase{

    use FeatureTestTrait;

    public function testLogin(){
        $this->call('post', 'login', [
            'email' => 'syfraihanihinduan@gmail.com',
            'sandi' => '123456'
        ])->assertStatus(200);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'pustakawan', [
            'nama_lengkap'      => 'Testing nama',
            'gender'    => 'P',
            'email'     => 'testing@email.com',
            'sandi'     =>'testing'
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "pustakawan/".$js['id'])
             ->assertStatus(200);

        $this->call('patch', 'pustakawan', [
            'nama_lengkap'      => 'Testing pustakawan update',
            'gender'    => 'P',
            'email'     => 'testingupdate@gmail.com',
            'id'        => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'pustakawan', [
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    public function testRead(){
        $this->call('get', 'pustakawan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}