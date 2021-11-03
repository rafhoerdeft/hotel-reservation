<?php

namespace App\Modules\Landing\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table      = 'tbl_pengunjung';
    protected $primaryKey = 'id_pengunjung';

    protected $returnType     = 'object';

    // useSoftDeletes bernilai true, agar data yang dihapus tidak benar benar dihapus
    // protected $useSoftDeletes = true;

    // set untuk kolom yang dapat di insert atau diupdate 
    protected $allowedFields = ['ip_add', 'agent', 'platform', 'client_id', 'tanggal'];


    public function getDataHariIni()
    {
        return $this->select("COUNT(id_pengunjung) as jml")->getWhere(['tanggal' => date('Y-m-d')])->getRow()->jml;
    }

    public function getDataKemarin()
    {
        return $this->select("COUNT(id_pengunjung) as jml")->getWhere(['tanggal' => date("Y-m-d", strtotime('-1 day'))])->getRow()->jml;
    }

    public function getDataBulanIni()
    {
        return $this->select("COUNT(id_pengunjung) as jml")->getWhere(['MONTH(tanggal)' => date('n'), 'YEAR(tanggal)' => date('Y')])->getRow()->jml;
    }

    public function getDataTahunIni()
    {
        return $this->select("COUNT(id_pengunjung) as jml")->getWhere(['YEAR(tanggal)' => date('Y')])->getRow()->jml;
    }

    public function getDataTotal()
    {
        return $this->select("COUNT(id_pengunjung) as jml")->get()->getRow()->jml;
    }

    public function insertData()
    {
        helper('ipadd');
        helper('text');
        helper('cookie');
        $ip = get_client_ip();

        if (get_cookie('hotel_client_id', true)) {
            $client_id = get_cookie("hotel_client_id");
        } else {
            $client_id = random_string('numeric', 6);
            set_cookie([
                'name'      => 'hotel_client_id',
                'value'     => $client_id,
                'expire'    => 3600 * 24,
            ]);
        }

        $request = \Config\Services::request();
        $agent = $request->getUserAgent();
        $platform = $agent->getPlatform();

        if ($agent->isBrowser()) {
            $user_agent = $agent->getBrowser() . ' ' . $agent->getVersion();
        } elseif ($agent->isRobot()) {
            $user_agent = $this->agent->robot();
        } elseif ($agent->isMobile()) {
            $user_agent = $agent->getMobile();
        } else {
            $user_agent = 'Unidentified';
        }

        $check = $this->getWhere([
            'ip_add'    => $ip,
            'agent'     => $user_agent,
            'platform'  => $platform,
            'client_id' => $client_id,
            'tanggal'   => date('Y-m-d'),
        ]);
        if ($check->getNumRows() == 0) {
            return $this->insert([
                'ip_add'    => $ip,
                'agent'     => $user_agent,
                'platform'  => $platform,
                'client_id' => $client_id,
                'tanggal'   => date('Y-m-d')
            ]);
        } else {
            return false;
        }
    }
}
