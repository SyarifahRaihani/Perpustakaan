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
            'gender'            => 'P',
            'tgl_lahir'         => '2022-01-01',
            'level'             => 'testing level',
            'email'             => 'testing@email.com',
            'sandi'             =>'testing',
            'nohp'              => '085849999627',
            'alamat'            => 'testing alamat',
            'kota'              => 'testing kota',
            'token_reset'       => '123456789'

        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "pustakawan/".$js['id'])
             ->assertStatus(200);

        $this->call('patch', 'pustakawan', [
            'nama_lengkap'      => 'Testing pustakawan update',
            'gender'    => 'P',
            'tgl_lahir' => '2022-01-01',
            'level'     => 'testing level update',
            'email'     => 'testingupdate@gmail.com',
            'nohp'      => '085849999627',
            'alamat'    => 'testing alamat update',
            'kota'      => 'testing kota update',
            'token_reset' => '123456789',
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