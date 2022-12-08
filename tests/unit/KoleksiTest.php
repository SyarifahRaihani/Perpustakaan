<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class KoleksiTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'koleksi' , [
            'judul'         =>'',
            'jilid'         =>'',
            'edisi'         =>'',
            'penerbit_id'   =>'',
            'penulis'       =>'',
            'thn_terbit'    =>'',
            'klasifikasi_id'=>'',
            'juml_halaman'  =>'',
            'isbn'          =>'',
            'bahasa_id'     =>'',
            'stok'          =>'',
            'eksemplar'     =>'',
            'kategori_id'   =>'',
            'pustakawan_id' =>'',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "koleksi/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'koleksi' ,[
                'judul'         =>'',
                'jilid'         =>'',
                'edisi'         =>'',
                'penerbit_id'   =>'',
                'penulis'       =>'',
                'thn_terbit'    =>'',
                'klasifikasi_id'=>'',
                'juml_halaman'  =>'',
                'isbn'          =>'',
                'bahasa_id'     =>'',
                'stok'          =>'',
                'eksemplar'     =>'',
                'kategori_id'   =>'',
                'pustakawan_id' =>'',
                'id' => isset( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'koleksi', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'koleksi/all' )
                 ->assertStatus(302);
    }
}
