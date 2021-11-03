<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table      = 'tbl_profil';
    protected $primaryKey = 'id_profil';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['isi_profil', 'tugas_pokok', 'struktur_organisasi', 'waktu_update', 'active'];


    public function getData()
    {
        return $this->where(['active' => 1, 'id_profil' => 1])->get()->getRow();
    }
}
