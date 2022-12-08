<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class TransaksiTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'transaksi' , [
            'tgl_pinjam'            => '',
            'anggota_id'            => '',
            'stokkoleksi_id'        => '',
            'pustakawan_id'         => '',
            'kembali_pustakawan_id' => '',
            'denda'                 => '',
            'status_trx'            => '',
            'catatan'               => '',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "transaksi/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'transaksi' ,[
            'tgl_pinjam'            => '',
            'anggota_id'            => '',
            'stokkoleksi_id'        => '',
            'pustakawan_id'         => '',
            'kembali_pustakawan_id' => '',
            'denda'                 => '',
            'status_trx'            => '',
            'catatan'               => '',
                'id' => isset( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'transaksi', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'transaksi/all' )
                 ->assertStatus(302);
    }
}