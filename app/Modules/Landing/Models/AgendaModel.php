<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table      = 'tbl_agenda';
    protected $primaryKey = 'id_agenda';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['id_user', 'judul_agenda', 'isi_agenda', 'waktu_awal', 'waktu_akhir', 'waktu_update', 'agenda'];


    public function getData($jenis = 'bulan')
    {
        //tampil per bulan / per tahun
        if ($jenis == 'bulan') {
            return $this->where(['active' => 1, 'MONTH(waktu_awal)' => date('n'), 'YEAR(waktu_awal)' => date('Y')])->orderBy('waktu_awal ASC', 'id_agenda ASC')->findAll();
        } else {
            return $this->where(['active' => 1, 'YEAR(waktu_awal)' => date('Y')])->findAll();
        }
    }
}
