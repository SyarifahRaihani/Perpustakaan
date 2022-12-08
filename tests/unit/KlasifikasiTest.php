<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class KlasifikasiTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'klasifikasi' , [
        'ddc'   => '',
        'nama'  => '',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "klasifikasi/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'klasifikasi' ,[
                'ddc'   => '',
                'nama'  => '',
                'id' => isset( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'klasifikasi', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'klasifikasi/all' )
                 ->assertStatus(302);
    }
}