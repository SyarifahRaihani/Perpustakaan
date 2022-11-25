<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
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

    // Validation
    protected $validationRules      = [];
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
        $view = (new TransaksiModel())
                ->select("transaksi.*, anggota.nama_depan as anggota, stokkoleksi.nomor as stokkoleksi, 
                         pustakawan.nama_lengkap as pustakawan ")
                ->join( 'anggota', 'transaksi.anggota_id = anggota.id', 'left')         
                ->join( 'stokkoleksi', 'transaksi.stokkoleksi_id = stokkoleksi.id', 'left')
                ->join( 'pustakawan', 'transaksi.pustakawan_id = pustakawan.id', 'left')
                ->builder();
        $r = db_connect()->newQuery()->fromSubquery( $view,'tbl');
        $r->table = 'tbl';
        return $r;
    }  
}
