<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class ReservasiModel extends Model
{
    protected $table      = 'tbl_reservasi';
    protected $primaryKey = 'id_reservasi';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['id_user', 'no_order', 'waktu_booking', 'tgl_awal', 'tgl_akhir', 'jml_hari', 'status'];


    public function getData($id = null)
    {
        $this->join('tbl_user as usr', 'tbl_reservasi.id_user = usr.id_user', 'LEFT');
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['tbl_reservasi.id_reservasi' => $id])->getRow();
        }
    }
}
