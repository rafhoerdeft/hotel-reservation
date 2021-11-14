<?php

namespace App\Modules\Landing\Controllers;

use App\Modules\Landing\Models\CarouselModel;
use App\Modules\Landing\Models\JenisKamarModel;
use App\Modules\Landing\Models\KamarModel;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Exceptions\PageNotFoundException;

class Beranda extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        helper('text');
        $m_carousel = new CarouselModel();
        $m_jenis_kamar = new JenisKamarModel();

        $this->v_data['carousel']       = $m_carousel->getData(null, 3);
        $this->v_data['jenis_kamar']    = $m_jenis_kamar->getData();

        $this->v_data['active']     = '1';

        return views('content/beranda/content', 'Landing', $this->v_data);
    }

    public function checkRooms()
    {
        if ($this->request->getPost()) {
            $m_kamar = new KamarModel();
            $room = $this->request->getVar('room');
            $checkin = $this->request->getVar('checkin');
            $checkout = $this->request->getVar('checkout');
            $count = $this->request->getVar('count');
            $tgl_checkin = date('Y-m-d', strtotime(str_replace('/', '-', $checkin)));
            $tgl_checkout = date('Y-m-d', strtotime(str_replace('/', '-', $checkout)));

            $check_room = $m_kamar->select(["GROUP_CONCAT(id_kamar SEPARATOR ';') as rooms", "COUNT(id_kamar) as count"])->where('id_jenis_kamar', decode($room))->whereNotIn('id_kamar', function (BaseBuilder $builder) use ($tgl_checkin, $tgl_checkout) {
                return $builder->select('id_kamar')->from('tbl_reservasi_detail')->whereIn('id_reservasi', function (BaseBuilder $builder) use ($tgl_checkin, $tgl_checkout) {
                    return $builder->select('id_reservasi')->from('tbl_reservasi')->where("('" . $tgl_checkin . "' BETWEEN tgl_awal AND tgl_akhir) OR ('" . $tgl_checkout . "' BETWEEN tgl_awal AND tgl_akhir)")->orWhere("('" . $tgl_checkin . "' < tgl_awal AND '" . $tgl_checkout . "' > tgl_akhir)");
                });
            });

            if ($check_room->countAllResults(false) > 0) {
                $room_data = $check_room->get()->getRow();
                $room_exp = explode(';', $room_data->rooms);
                $room_arr = [];
                if ($count <= $room_data->count) {
                    for ($i = 0; $i < $count; $i++) {
                        $room_arr[] = $room_exp[$i];
                    }
                } else {
                    $room_arr = $room_exp;
                }

                if (!empty($room_arr)) {
                    $rooms = implode(';', $room_arr);
                } else {
                    $rooms = '';
                }
                $room_available = [
                    'rooms' => $rooms,
                    'count' => $room_data->count,
                ];
                $res = ['response' => true, 'data' => $room_available];
            } else {
                $res = ['response' => false];
            }
            echo json_encode($res);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}
