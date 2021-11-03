<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class KategoriGaleriModel extends Model
{
    protected $table      = 'tbl_kategori_galeri as kg';
    protected $primaryKey = 'id_kg';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    protected $useSoftDeletes = true;

    //set nama kolom delete pada tabel dengan type datetime
    protected $deletedField  = 'deleted_at';

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['nama_kategori', 'active'];


    public function getData($active = 1)
    {
        if ($active != null) {
            $this->where("kg.active = $active");
        }
        $this->select('kg.*');
        $this->select("(SELECT COUNT(tg.id_galeri) FROM tbl_galeri tg WHERE tg.id_kg = kg.id_kg) as jml_galeri");
        $this->whereIn('id_kg', function (BaseBuilder $builder) {
            return $builder->select('id_kg')->from('tbl_galeri');
        });
        return $this->get()->getResult();
    }
}
