<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class SkpdModel extends Model
{
    protected $table      = 'tbl_skpd';
    protected $primaryKey = 'id_skpd';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    protected $useSoftDeletes = true;

    //set nama kolom delete pada tabel dengan type datetime
    protected $deletedField  = 'deleted_at';


    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['nama_skpd', 'active'];


    public function getData($id = null)
    {
        if ($id === null) {
            return $this->where('active = 1')->findAll();
        } else {
            return $this->getWhere(['id_skpd' => $id])->getRow();
        }
    }
}
