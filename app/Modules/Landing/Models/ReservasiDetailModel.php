<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class ReservasiDetailModel extends Model
{
    protected $table      = 'tbl_reservasi_detail';
    protected $primaryKey = 'id_rd';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['id_reservasi', 'id_kamar'];


    public function getData($id)
    {
        return $this->where('tbl_reservasi_detail.id_reservasi', $id)
            ->join('tbl_reservasi as rsv', 'tbl_reservasi_detail.id_reservasi = rsv.id_reservasi', 'LEFT')
            ->join('tbl_kamar as kmr', 'tbl_reservasi_detail.id_kamar = kmr.id_kamar', 'LEFT')
            ->join('tbl_jenis_kamar as jkm', 'kmr.id_jenis_kamar = jkm.id_jenis_kamar', 'LEFT')
            ->findAll();
    }
}
