<?php

namespace App\Models;

use CodeIgniter\Model;

class KoleksiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'koleksi';
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
        $view = (new KoleksiModel())
                ->select("koleksi.*, penerbit.nama as penerbit, klasifikasi.nama as klasifikasi,
                         bahasa.kode as bahasa, kategori.nama as kategori, pustakawan.nama_lengkap as pustakawan ")
                ->join( 'penerbit', 'koleksi.penerbit_id = penerbit.id', 'left')
                ->join( 'klasifikasi', 'koleksi.klasifikasi_id = klasifikasi.id', 'left')
                ->join( 'bahasa', 'koleksi.bahasa_id = bahasa.id', 'left')
                ->join( 'kategori', 'koleksi.kategori_id = kategori.id', 'left')
                ->join( 'pustakawan', 'koleksi.pustakawan_id = pustakawan.id', 'left')
                ->builder();
        $r = db_connect()->newQuery()->fromSubquery( $view,'tbl');
        $r->table = 'tbl';
        return $r;
    }
}

