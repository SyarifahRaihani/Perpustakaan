<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */

class PenerbitbayarTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete()
    {
        $json = $this->call('post', 'Penerbitbayar', [
            'Penerbit'       => 'Testing Penerbit',
            'aktif'         => 'Y'
        ])->getJson();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Penerbitbayar/", $js['id'])
            ->assertStatus(200);

        $this->call('patch', 'Penerbitbayar', [
            'Penerbit'   => 'Testing Penerbit update',
            'aktif'     => 'Y',
            'id'        => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Penerbitbayar', [
            'id' => $js['id']
        ])->assertStatus(200);
    }

    public function testRead()
    {
        $this->call('get', 'Penerbitbayar/all')
            ->assertStatus(200);
    }
}
