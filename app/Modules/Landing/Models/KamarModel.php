<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table      = 'tbl_kamar';
    protected $primaryKey = 'id_kamar';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['id_jenis_kamar', 'kode_kamar'];


    public function getData()
    {
        return $this->join('tbl_jenis_kamar as jk', 'tbl_kamar.id_jenis_kamar = jk.id_jenis_kamar', 'LEFT')
            ->findAll();
    }

    public function getKamar($check_in, $check_out, $jml)
    {
        # code...
    }
}
