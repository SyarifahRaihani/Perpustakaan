<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class AnggotaTest extends CIUnitTestCase{

    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'anggota', [
            'nama_depan'      => 'Testing nama depan',
            'nama_belakang'   => 'Testing nama belakang',
            'email'           => 'testing@email.com',
            'nohp'            => '085849999627',
            'alamat'          => 'testing alamat',
            'kota'            => 'testing kota',
            'gender'          => 'P',
            'tgl_lahir'       => '2022-01-01',
            'foto'            => '',
            'tgl_daftar'      => '2022-01-01',
            'status_aktif'    => '2022-01-01',
            'berlaku_awal'    => '2022-01-01',
            'berlaku_akhir'   => '2022-01-01',

        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "anggota/".$js['id'])
             ->assertStatus(200);

        $this->call('patch', 'anggota', [
            'nama_depan'      => 'Testing nama depan update',
            'nama_belakang'   => 'Testing nama belakang update',
            'email'           => 'testingupdate@email.com',
            'nohp'            => '085849999627',
            'alamat'          => 'testing alamat update',
            'kota'            => 'testing kota update',
            'gender'          => 'P',
            'tgl_lahir'       => '2022-01-01',
            'foto'            => '',
            'tgl_daftar'      => '2022-01-01',
            'status_aktif'    => '2022-01-01',
            'berlaku_awal'    => '2022-01-01',
            'berlaku_akhir'   => '2022-01-01',
            'id'        => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'anggota', [
            'id'    => $js['id']
        ])->assertStatus(200);
    }

    public function testRead(){
        $this->call('get', 'anggota/all')
             ->assertStatus(200);
    }

}