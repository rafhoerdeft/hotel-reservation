<?php

namespace App\Modules\Landing\Controllers;

use App\Modules\Landing\Models\BayarModel;
use App\Modules\Landing\Models\JenisKamarModel;
use App\Modules\Landing\Models\ReservasiDetailModel;
use App\Modules\Landing\Models\ReservasiModel;
use App\Modules\Landing\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Booking extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    public function getToken()
    {
        $post = $this->request->getPost();
        if ($post) {

            $m_room = new JenisKamarModel();

            $no_order = time();

            $id_jenis_kamar = decode($post['jenis_kamar']);
            $data_kamar = $m_room->getData($id_jenis_kamar);
            $harga_kamar = $data_kamar->harga;

            $checkin = date('Y-m-d', strtotime(str_replace('/', '-', $post['checkin'])));
            $checkout = date('Y-m-d', strtotime(str_replace('/', '-', $post['checkout'])));
            $date1 = date_create($checkin);
            $date2 = date_create($checkout);
            $diff = date_diff($date1, $date2);
            $jml_hari = $diff->format("%a");

            $tot_bayar = (int)$harga_kamar * (int)$post['jml_kamar'] * (int)$jml_hari;

            // Required
            $transaction_details = array(
                'order_id' => $no_order,
                'gross_amount' => $tot_bayar, // no decimal allowed for creditcard
            );

            $item_details = array();

            for ($i = 0; $i < $post['jml_kamar']; $i++) {
                $item_details[] = [
                    'id' => $id_jenis_kamar,
                    'price' => $harga_kamar,
                    'quantity' => $jml_hari,
                    'name' => $data_kamar->nama_jenis_kamar,
                ];
            }

            // Optional
            $billing_address = array(
                'first_name'    => "Andri",
                'last_name'     => "Litani",
                'address'       => "Mangga 20",
                'city'          => "Jakarta",
                'postal_code'   => "16602",
                'phone'         => "081122334455",
                'country_code'  => 'IDN'
            );

            // Optional
            $shipping_address = array(
                'first_name'    => "Obet",
                'last_name'     => "Supriadi",
                'address'       => "Manggis 90",
                'city'          => "Jakarta",
                'postal_code'   => "16601",
                'phone'         => "08113366345",
                'country_code'  => 'IDN'
            );

            if (isset($post['user'])) { // jika sudah login
                $m_user = new UserModel();
                $user = $m_user->getData(decode($post['user']));
                $customer_details = array(
                    'first_name'    => $user->first_name,
                    'last_name'     => $user->last_name,
                    'email'         => $user->email_user,
                    'phone'         => $user->no_hp_user,
                    // 'billing_address'  => $billing_address,
                    // 'shipping_address' => $shipping_address
                );
            } else {
                $customer_details = array(
                    'first_name'    => $post['fname'],
                    'last_name'     => $post['lname'],
                    'email'         => $post['email_user'],
                    'phone'         => $post['no_hp_user'],
                    // 'billing_address'  => $billing_address,
                    // 'shipping_address' => $shipping_address
                );
            }


            // Data yang akan dikirim untuk request redirect_url.
            $credit_card['secure'] = true;
            //ser save_card true to enable oneclick or 2click
            //$credit_card['save_card'] = true;

            $time = time();
            $custom_expiry = array(
                'start_time' => date("Y-m-d H:i:s O", $time),
                'unit' => 'day',
                'duration'  => 1
            );

            $transaction_data = array(
                'transaction_details'   => $transaction_details,
                'item_details'          => $item_details,
                'customer_details'      => $customer_details,
                'credit_card'           => $credit_card,
                'expiry'                => $custom_expiry
            );

            // error_log(json_encode($transaction_data));
            $snapToken = snapTokenMt($transaction_data);
            // error_log($snapToken);
            if ($snapToken) {
                $res = ['response' => true, 'token' => $snapToken, 'data' => $post];
            } else {
                $res = ['response' => false, 'alert' => 'Gagal mendapat token'];
            }

            echo json_encode($res);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function saveBook()
    {
        $post = $this->request->getPost();
        if ($post) {
            $m_user = new UserModel();
            $m_resv = new ReservasiModel();
            $m_detail = new ReservasiDetailModel();
            $m_room = new JenisKamarModel();
            $m_bayar = new BayarModel();

            $result_type = $post['result_type'];
            $result_data = json_decode($post['result_data'], true);
            $input_data = json_decode($post['input_data'], true);

            // echo '<pre>';
            // print_r($result_data);
            // echo "<br>";
            // echo "<br>";
            // print_r($input_data);
            // echo '</pre>';
            // exit();

            // Using transaction query, if one group query fails all group will rolled back
            $this->db->transStart(); // Start transaction query
            if (!isset($input_data['user'])) { // jika belum login
                $data_user = array(
                    'nama_user'     => $input_data['fname'] . ' ' . $input_data['lname'],
                    'first_name'    => $input_data['fname'],
                    'last_name'     => $input_data['lname'],
                    'no_hp_user'    => $input_data['no_hp_user'],
                    'email_user'    => $input_data['email_user'],
                );
                $m_user->save($data_user);
                $id_user = $this->db->insertID();
            } else {
                $id_user = decode($input_data['user']);
            }

            $no_order = $result_data['order_id'];
            $checkin = date('Y-m-d', strtotime(str_replace('/', '-', $input_data['checkin'])));
            $checkout = date('Y-m-d', strtotime(str_replace('/', '-', $input_data['checkout'])));
            $date1 = date_create($checkin);
            $date2 = date_create($checkout);
            $diff = date_diff($date1, $date2);
            $jml_hari = $diff->format("%a");

            $id_jenis_kamar = decode($input_data['jenis_kamar']);
            $data_kamar = $m_room->getData($id_jenis_kamar);
            $harga_kamar = $data_kamar->harga;

            $tot_bayar = (int)$harga_kamar * (int)$input_data['jml_kamar'] * (int)$jml_hari;

            $data_resv = array(
                'id_user'       => $id_user,
                'no_order'      => $no_order,
                'waktu_booking' => date('Y-m-d H:i:s'),
                'tgl_awal'      => $checkin,
                'tgl_akhir'     => $checkout,
                'jml_hari'      => (int)$jml_hari,
                'status'        => 1,
            );
            $save_resv = $m_resv->save($data_resv);

            if ($save_resv) {
                $id_reservasi = $this->db->insertID();
                $rooms = explode(';', $input_data['kamar']);
                foreach ($rooms as $id) {
                    $data_detail = array(
                        'id_reservasi'  => $id_reservasi,
                        'id_kamar'      => $id,
                    );
                    $m_detail->save($data_detail);
                }

                $data_bayar = array(
                    'id_reservasi'  => $id_reservasi,
                    'total_bayar'   => $tot_bayar,
                    'jenis_bayar'   => $result_data['payment_type'],
                    'kode_status'   => $result_data['status_code'],
                    'pdf_url'       => $result_data['pdf_url'],
                );
                if ($result_data['payment_type'] == 'bank_transfer') {
                    $data_bayar['via_bayar'] = $result_data['va_numbers'][0]['bank']; // Nama Bank
                    $data_bayar['via_nomor'] = $result_data['va_numbers'][0]['va_number']; // Kode Pembayaran
                }
                if ($result_data['payment_type'] == 'qris') { // Khusus Shopee Pay
                    $data_bayar['via_bayar'] = 'shopee pay';
                }
                if ($result_data['payment_type'] == 'echannel') { // Khusus Bank Mandiri
                    $data_bayar['via_bayar'] = $result_data['biller_code']; // Kode Perusahaan
                    $data_bayar['via_nomor'] = $result_data['bill_key']; // Kode Pembayaran
                }
                if ($result_data['payment_type'] == 'cstore') { // Khusus Indomart/Alfamart
                    $data_bayar['via_nomor'] = $result_data['payment_code']; // Kode Pembayaran
                }
                $m_bayar->save($data_bayar);
            }

            $this->db->transComplete(); // Transaction complete

            if ($this->db->transStatus() === false) { // Error check
                $res = ['response' => false, 'alert' => "Gagal simpan data reservasi"];
                echo json_encode($res);
            } else {
                // $res = ['response' => true, 'alert' => "Berhasil simpan data reservasi"];
                return redirect()->to('/landing/booking/result/' . encode($id_reservasi));
            }
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function resultTrans($id)
    {
        // $this->v_data['active']     = FALSE;
        $m_resv = new ReservasiModel();
        $m_detail = new ReservasiDetailModel();

        $resv = $m_resv->join('tbl_bayar byr', 'tbl_reservasi.id_reservasi = byr.id_reservasi', 'LEFT')->getData(decode($id));

        if ($resv) {
            $this->v_data['resv']       = $resv;
            $this->v_data['detail']     = $m_detail->getData(decode($id));
            $this->v_data['menu_link']  = TRUE;

            return views('content/booking/result', 'Landing', $this->v_data);
        } else {
            return redirect()->to(base_url());
        }
    }
}
