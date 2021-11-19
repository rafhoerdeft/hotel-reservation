<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class JenisKamarModel extends Model
{
    protected $table      = 'tbl_jenis_kamar';
    protected $primaryKey = 'id_jenis_kamar';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    protected $useSoftDeletes = true;

    //set nama kolom delete pada tabel dengan type datetime
    protected $deletedField  = 'deleted_at';

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = [
        'nama_jenis_kamar',
        'keterangan',
        'jenis_bed',
        'bed',
        'kapasitas',
        'harga',
        'ac',
        'tv',
        'wifi',
        'shower',
        'bathtub',
        'drink',
        'breakfast',
        'telephone',
        'diskon',
        'foto',
        // 'slug',
    ];


    public function getData($id = null)
    {
        if ($id != null) {
            return $this->getWhere(['id_jenis_kamar' => $id])->getRow();
        } else {
            return $this->findAll();
        }
    }
}
