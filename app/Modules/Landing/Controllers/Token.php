<?php

namespace App\Modules\Landing\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Token extends BaseController
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
            helper('wa');

            $this->session->setTempdata('cektoken', false, 300); //simpan session cektoken 300 second

            $no_hp = $post['no_hp'];
            $cek_no_hp = check_wa($no_hp);

            if ($cek_no_hp) {
                $token = $this->generateRandomString(6, 120);

                $pesan = "Kode token anda adalah : *" . $token . "*\nKode ini bersifat rahasia. Jangan berikan kode token kepada siapapun.\n\nDikirim dari *epikir.magelangkab.go.id*";

                $send_msg = send_wa($no_hp, $pesan);

                if ($send_msg) {
                    $datas = ['success' => true];
                } else {
                    $datas = ['success' => false, 'alert' => 'Token gagal dikirim'];
                }
            } else {
                $datas = ['success' => false, 'alert' => 'Nomor HP Anda tidak terdaftar WhatsApp'];
            }

            return json_encode($datas);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function checkToken()
    {
        $token = $this->request->getVar('token');
        if ($token) {
            if ($this->session->getTempdata('tokensxxx') != '' && $this->session->getTempdata('tokensxxx') == $token) {
                $this->session->setTempdata('cektoken', true, 30);

                $res = ['success' => true];
            } else {
                $res = ['success' => false, 'alert' => 'Token tidak cocok.'];
            }

            echo json_encode($res);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    function generateRandomString($length = 6, $time = 90)
    {
        helper('text');
        $randomString = random_string('numeric', $length);

        $this->session->setTempdata('tokensxxx', $randomString, ($time + 10));
        return $randomString;
    }
}
