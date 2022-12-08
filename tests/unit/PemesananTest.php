<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class PemesananTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'pemesanan' , [
            'tgl_akhir'     => '',
            'koleksi_id'    => '',
            'anggota_id'    => '',
            'status_pesan'  => '',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "pemesanan/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'pemesanan' ,[
            'tgl_akhir'     => '',
            'koleksi_id'    => '',
            'anggota_id'    => '',
            'status_pesan'  => '',
                'id' => isset( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'pemesanan', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'pemesanan/all' )
                 ->assertStatus(302);
    }
}