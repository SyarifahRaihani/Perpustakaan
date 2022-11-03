<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */

class KoleksibayarTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete()
    {
        $json = $this->call('post', 'koleksibayar', [
            'Koleksi'       => 'Testing koleksi',
            'aktif'         => 'Y'
        ])->getJson();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "koleksibayar/", $js['id'])
            ->assertStatus(200);

        $this->call('patch', 'koleksibayar', [
            'Koleksi'   => 'Testing Koleksi update',
            'aktif'     => 'Y',
            'id'        => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Koleksibayar', [
            'id' => $js['id']
        ])->assertStatus(200);
    }

    public function testRead()
    {
        $this->call('get', 'Koleksibayar/all')
            ->assertStatus(200);
    }
}
