<?php

namespace App\Modules\Landing\Controllers;

use App\Modules\Landing\Models\LoginModel;
use App\Modules\Landing\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth extends BaseController
{
    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    public function login()
    {
        $this->session->destroy();
        $this->v_data['menu_link']  = TRUE;
        $this->v_data['active']     = '5';

        return views('content/auth/login', 'Landing', $this->v_data);
    }

    public function processLogin()
    {
        $post = $this->request->getPost();
        if ($post) {

            $username = htmlspecialchars_decode($this->request->getVar('username'));
            $password = htmlspecialchars_decode($this->request->getVar('password'));
            $pass = md5($password);

            $where = array(
                'username' => $username,
                'password' => $pass,
            );

            $hasil = $this->MasterData->getWhereDataAll('tbl_login', $where);

            if (count($hasil->getResultArray()) == 1) {
                $role = $hasil->getRow()->role;
                $id_user = $hasil->getRow()->id_user;
                $user = $this->MasterData->getWhereDataAll('tbl_user', "id_user = $id_user")->getRow();

                $sess_data['user']         = $id_user;
                $sess_data['nama_user']    = $user->nama_user;
                $sess_data['first_name']   = $user->first_name;
                $sess_data['last_name']    = $user->last_name;
                $sess_data['email_user']   = $user->email_user;
                $sess_data['no_hp_user']   = $user->no_hp_user;
                $sess_data['role']         = $role;
                $sess_data['logs']         = user_log;

                $this->session->set($sess_data);

                return redirect()->to(base_url());
            } else {
                alert_failed('Username atau password salah.');
                return redirect()->to(base_url('landing/login'));
            }
        } else {
            return redirect()->to(base_url('landing/login'));
        }
    }

    public function register()
    {
        $this->v_data['menu_link']  = TRUE;
        $this->v_data['active']     = '5';

        return views('content/auth/register', 'Landing', $this->v_data);
    }

    public function saveRegister()
    {
        $post = $this->request->getPost();
        if ($post) {
            $m_user = new UserModel();
            $m_login = new LoginModel();

            $this->db->transStart();
            $data_user = array(
                'nama_user'     => $post['fname'] . ' ' . $post['lname'],
                'first_name'    => $post['fname'],
                'last_name'     => $post['lname'],
                'no_hp_user'    => $post['no_hp_user'],
                'email_user'    => $post['email_user'],
            );
            $save_user = $m_user->save($data_user);
            if ($save_user) {
                $id_user = $this->db->insertID();

                $data_login = array(
                    'id_user'   => $id_user,
                    'username'  => $post['email_user'],
                    'password'  => md5($post['password']),
                    'role'      => 'user',
                );
                $m_login->save($data_login);
            }
            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                $res = ['response' => false, 'alert' => "Gagal simpan data user"];
            } else {
                alert_success('Selamat, registrasi berhasil. Silahkan login.');
                $res = ['response' => true, 'alert' => "Berhasil simpan data user", 'url' => base_url('landing/login')];
            }
            echo json_encode($res);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to(base_url());
    }
}
