<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */

class KoleksiTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testCreateShowUpdateDelete()
    {
        $json = $this->call('post', 'koleksi', [
            'Koleksi'       => 'Testing koleksi',
            'aktif'         => 'Y'
        ])->getJson();
        $js = json_decode($json, true);

        $this->assertTrue($js['id'] > 0);

        $this->call('get', "koleksi/", $js['id'])
            ->assertStatus(200);

        $this->call('patch', 'koleksi', [
            'Koleksi'   => 'Testing Koleksi update',
            'aktif'     => 'Y',
            'id'        => $js['id']
        ])->assertStatus(200);

        $this->call('delete', 'Koleksi', [
            'id' => $js['id']
        ])->assertStatus(200);
    }

    public function testRead()
    {
        $this->call('get', 'Koleksi/all')
            ->assertStatus(200);
    }
}
