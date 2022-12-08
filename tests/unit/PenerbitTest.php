<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class PenerbitTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete(){
       $json = $this->call('post' , 'penerbit' , [
            'nama'   => '',
            'kota'   => '',
            'negara' => '',
       ])->getJSON();
        $js = json_decode($json, true);
        $this->assertNotTrue(isset ( $js['id']) > 0);

        $this->call('get', "penerbit/". isset ($js['id']))
             ->assertStatus(302);
             $this->call('patch' , 'penerbit' ,[
            'nama'   => '',
            'kota'   => '',
            'negara' => '',
                'id' => isset( $js['id'])
                ])->assertStatus(302);
                
            $this->call('delete' , 'penerbit', [
                'id' => isset($js['id'])
            ])->assertStatus(302);
        }
    
        public function testRead(){
            $this->call('get' , 'pustakawan/all' )
                 ->assertStatus(302);
    }
}
