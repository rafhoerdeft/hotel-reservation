<?php

namespace App\Modules\Landing\Controllers;

use App\Modules\Landing\Models\BayarModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Notification extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);

        if ($result) {
            $m_bayar = new BayarModel();

            $status_code = $result->status_code;
            if ($status_code == '200') {
                $order_id = $result->order_id;
                $data_bayar = array(
                    'tgl_bayar'     => date('Y-m-d H:i:s'),
                    'kode_status'   => $status_code,
                    'status'        => 2
                );
                $update_bayar = $m_bayar->set($data_bayar)->where("id_reservasi = (SELECT rsv.id_reservasi FROM tbl_reservasi rsv WHERE rsv.no_order = '$order_id')")->update();
                if ($update_bayar) {
                    echo 'sukses';
                } else {
                    echo 'failed';
                }
            }
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}
