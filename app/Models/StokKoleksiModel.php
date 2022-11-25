<?php

namespace App\Models;

use CodeIgniter\Model;

class StokKoleksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'stokkoleksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    static public function view(){
        $view = (new StokKoleksiModel())
                ->select("stokkoleksi.*, koleksi.judul as koleksi, anggota.nama_depan as anggota,
                         pustakawan.nama_lengkap as pustakawan ")
                ->join( 'koleksi', 'stokkoleksi.koleksi_id = koleksi.id', 'left')
                ->join( 'anggota', 'stokkoleksi.anggota_id = anggota.id', 'left')
                ->join( 'pustakawan', 'stokkoleksi.pustakawan_id = pustakawan.id', 'left')
                ->builder();
        $r = db_connect()->newQuery()->fromSubquery( $view,'tbl');
        $r->table = 'tbl';
        return $r;
    }   
}
