<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class CarouselModel extends Model
{
    protected $table      = 'tbl_carousel';
    protected $primaryKey = 'id_carousel';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['judul_carousel', 'ket_carousel', 'file_carousel'];

    // set bagian useTimestamps kita set true agar mencatat bagian created_at dan updated_at
    // protected $useTimestamps = true;


    public function getData($id = null, $limit = 5)
    {
        if ($id === null) {
            return $this->where('active', 1)->findAll($limit);
        } else {
            return $this->where('active', 1)->getWhere(['id_carousel' => $id]);
        }
    }
}
