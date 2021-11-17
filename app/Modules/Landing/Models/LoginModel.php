<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'tbl_login';
    protected $primaryKey = 'id_login';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    protected $useSoftDeletes = true;
    //set nama kolom delete pada tabel dengan type datetime
    protected $deletedField  = 'deleted_at';

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['id_user', 'username', 'password', 'role'];


    public function getData($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->where('id_login', $id)->get()->getRow();
        }
    }
}
