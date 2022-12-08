<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class BahasaTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'bahasa' , [
            'kode'        => '',
            'nama'        => '',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "bahasa/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'bahasa' ,[
                'kode'        => '',
                'nama'        => '',
                
                'id' => isset( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'bahasa', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'bahasa/all' )
                 ->assertStatus(302);
    }
}