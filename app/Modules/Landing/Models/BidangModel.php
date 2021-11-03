<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $table      = 'tbl_bidang';
    protected $primaryKey = 'id_bidang';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['nama_bidang', 'ket_bidang', 'icon_bidang', 'active'];


    public function getData($id = null)
    {
        if ($id === null) {
            return $this->where('active = 1')->findAll();
        } else {
            return $this->getWhere(['id_bidang' => $id])->getRow();
        }
    }
}
