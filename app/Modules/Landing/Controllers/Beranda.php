<?php

namespace App\Modules\Landing\Controllers;

use App\Modules\Landing\Models\CarouselModel;
use App\Modules\Landing\Models\JenisKamarModel;
use App\Modules\Landing\Models\KamarModel;
use App\Modules\Landing\Models\ReservasiDetailModel;
use App\Modules\Landing\Models\ReservasiModel;
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
                    return $builder->select('id_reservasi')
                        ->from('tbl_reservasi')
                        // ->where('status <', 3)
                        ->where("('" . $tgl_checkin . "' BETWEEN tgl_awal AND tgl_akhir) OR ('" . $tgl_checkout . "' BETWEEN tgl_awal AND tgl_akhir)")
                        ->orWhere("('" . $tgl_checkin . "' < tgl_awal AND '" . $tgl_checkout . "' > tgl_akhir)");
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

    public function searchRooms()
    {
        $m_jenis_kamar = new JenisKamarModel();

        $get = $this->request->getGet();
        if ($get) {
            if (isset($get['checkin']) && $get['checkin'] != null) {
                $checkin = date('Y-m-d', strtotime(str_replace('/', '-', $get['checkin'])));
            } else {
                $checkin = date('Y-m-d');
            }

            if (isset($get['checkout']) && $get['checkout'] != null) {
                if (date('Y-m-d', strtotime(str_replace('/', '-', $get['checkout']))) <= date('Y-m-d')) {
                    $checkout = date('Y-m-d', strtotime('+1 day'));
                } else {
                    $checkout = date('Y-m-d', strtotime(str_replace('/', '-', $get['checkout'])));
                }
            } else {
                $checkout = date('Y-m-d', strtotime('+1 day'));
            }

            if (isset($get['count']) && $get['count'] != null) {
                if ($get['count'] <= 32) {
                    if ($get['count'] > 0) {
                        $count = (int)$get['count'];
                    } else {
                        $count = 1;
                    }
                } else {
                    $count = 32;
                }
            } else {
                $count = 1;
            }

            $search_room = $m_jenis_kamar->select([
                "tbl_jenis_kamar.*",
                "GROUP_CONCAT(kmr.id_kamar SEPARATOR ';') as rooms",
                "COUNT(kmr.id_kamar) as count"
            ])->groupBy('tbl_jenis_kamar.id_jenis_kamar')
                ->join('tbl_kamar kmr', "tbl_jenis_kamar.id_jenis_kamar = kmr.id_jenis_kamar", "LEFT")
                ->having('(kapasitas * count) >=', $count)->whereNotIn('kmr.id_kamar', function (BaseBuilder $builder) use ($checkin, $checkout) {
                    return $builder->select('id_kamar')->from('tbl_reservasi_detail')->whereIn('id_reservasi', function (BaseBuilder $builder) use ($checkin, $checkout) {
                        return $builder->select('id_reservasi')
                            ->from('tbl_reservasi')
                            // ->where('status <', 3)
                            ->where("('" . $checkin . "' BETWEEN tgl_awal AND tgl_akhir) OR ('" . $checkout . "' BETWEEN tgl_awal AND tgl_akhir)")
                            ->orWhere("('" . $checkin . "' < tgl_awal AND '" . $checkout . "' > tgl_akhir)");
                    });
                });

            if ($search_room->countAllResults(false) > 0) {
                $data_rooms = $search_room->get()->getResult();
            } else {
                $data_rooms = null;
            }

            $this->v_data['checkin']        = $checkin;
            $this->v_data['checkout']       = $checkout;
            $this->v_data['count']          = $count;
            $this->v_data['jenis_kamar']    = $data_rooms;
            $this->v_data['menu_link']      = TRUE;

            return views('content/beranda/search_room', 'Landing', $this->v_data);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function historiBooking()
    {
        $m_resv = new ReservasiModel();

        $status_bayar = array(
            '1' => 'Belum Bayar',
            '2' => 'Lunas',
        );

        $resv = $m_resv->select([
            'tbl_reservasi.*',
            'tbl_reservasi.status as status_r',
            'byr.*',
            'byr.status as status_b',
            "GROUP_CONCAT(jkm.nama_jenis_kamar SEPARATOR ';') as nama_jenis_kamar",
            "GROUP_CONCAT(jkm.kapasitas SEPARATOR ';') as kapasitas",
            "GROUP_CONCAT(jkm.harga SEPARATOR ';') as harga",
        ])
            ->join('tbl_reservasi_detail rd', 'tbl_reservasi.id_reservasi = rd.id_reservasi', 'LEFT')
            ->join('tbl_kamar as kmr', 'rd.id_kamar = kmr.id_kamar', 'LEFT')
            ->join('tbl_jenis_kamar as jkm', 'kmr.id_jenis_kamar = jkm.id_jenis_kamar', 'LEFT')
            ->join('tbl_bayar byr', 'tbl_reservasi.id_reservasi = byr.id_reservasi', 'LEFT')
            ->where('tbl_reservasi.id_user', session('user'))
            ->groupBy('tbl_reservasi.id_reservasi')
            ->orderBy('tbl_reservasi.id_reservasi', 'DESC')
            ->getData();

        $this->v_data['resv']       = $resv;
        $this->v_data['status_b']   = $status_bayar;
        $this->v_data['active']     = 6;
        $this->v_data['menu_link']  = TRUE;

        return views('content/histori/list', 'Landing', $this->v_data);
    }
}
