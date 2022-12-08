<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class StokKoleksiTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'stokkoleksi' , [
            'koleksi_id'        => '',
            'nomor'             => '',
            'status_tersedia'   => '',
            'anggota_id'        => '',
            'pustakawan_id'     => '',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "stokkoleksi/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'stokkoleksi' ,[
            'koleksi_id'        => '',
            'nomor'             => '',
            'status_tersedia'   => '',
            'anggota_id'        => '',
            'pustakawan_id'     => '',
                'id' => isset ( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'stokkoleksi', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'stokkoleksi/all' )
                 ->assertStatus(302);
    }
}