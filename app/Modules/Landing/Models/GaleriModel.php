<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table      = 'tbl_galeri as tg';
    protected $primaryKey = 'id_galeri';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['id_user', 'id_kg', 'judul_galeri', 'ket_galeri', 'file_foto', 'link_video', 'waktu_kegiatan', 'waktu_update', 'jenis_galeri', 'active'];


    public function getData($id = null, $limit = 0, $jenis = '')
    {
        if ($id === null) {
            $where['tkg.active'] = 1;
            $where['tg.active'] = 1;
            if ($jenis != '') {
                $where['tg.jenis_galeri'] = $jenis;
            }
            return $this->where($where)
                ->join('tbl_kategori_galeri as tkg', 'tg.id_kg = tkg.id_kg', 'LEFT')
                ->orderBy('tg.waktu_update', 'DESC')
                ->orderBy('tg.id_galeri', 'DESC')
                ->findAll($limit);
        } else {
            return $this->join('tbl_kategori_galeri as tkg', 'tg.id_kg = tkg.id_kg', 'LEFT')->getWhere(['id_galeri' => $id])->getResult();
        }
    }
}
