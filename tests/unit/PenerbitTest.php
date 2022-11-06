<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */

class PenerbitTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete()
    {
        $json = $this->call('post', 'Penerbit', [
            'Penerbit'       => 'Testing Penerbit',
            'aktif'         => 'Y'
        ])->getJson();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "Penerbit/", $js['id'])
            ->assertStatus(200);

        $this->call('patch', 'Penerbit', [
            'Penerbit'   => 'Testing Penerbit update',
            'aktif'     => 'Y',
            'id'        => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Penerbit', [
            'id' => $js['id']
        ])->assertStatus(200);
    }

    public function testRead()
    {
        $this->call('get', 'Penerbit/all')
            ->assertStatus(200);
    }
}
