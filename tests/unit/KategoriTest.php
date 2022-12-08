<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class KategoriTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'kategori' , [
            'nama'        => '',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "kategori/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'kategori' ,[
                'nama'        => '',
                
                'id' => isset( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'kategori', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'kategori/all' )
                 ->assertStatus(302);
    }
}