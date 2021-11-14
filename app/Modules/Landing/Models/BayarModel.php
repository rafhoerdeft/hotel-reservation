<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class BayarModel extends Model
{
    protected $table      = 'tbl_bayar';
    protected $primaryKey = 'id_bayar';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['id_reservasi', 'tgl_bayar', 'total_bayar', 'jenis_bayar', 'via_bayar', 'via_nomor', 'kode_status', 'pdf_url', 'status'];


    public function getData()
    {
        return $this->join('tbl_reservasi as rsv', 'tbl_bayar.id_reservasi = rsv.id_reservasi', 'LEFT')
            ->findAll();
    }
}
