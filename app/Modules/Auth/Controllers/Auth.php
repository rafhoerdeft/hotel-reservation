<?php

namespace App\Modules\Auth\Controllers;

use App\Modules\Auth\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Auth extends BaseController
{

	public function index()
	{
		$this->session->destroy();
		return views('login', 'Auth', $this->v_data);
	}

	public function cekLogin()
	{
		$post = $this->request->getPost();
		if ($post) {

			$username = htmlspecialchars_decode($this->request->getVar('username'));
			$password = htmlspecialchars_decode($this->request->getVar('password'));
			$pass = md5($password);

			$where = array(
				'username' => $username,
				'password' => $pass
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
				// $sess_data['username']     = $hasil->getRow()->username;
				$sess_data['role']         = $role;
				$sess_data['logs']         = admin_log;

				$this->session->set($sess_data);

				$datas = ['success' => true, 'role' => $role, 'link' => base_url(strtolower($role))];
			} else {
				$datas = ['success' => false, 'alert' => 'Username atau password salah.'];
			}

			echo json_encode($datas);
		} else {
			throw PageNotFoundException::forPageNotFound();
		}
	}

	public function logout()
	{
		// Hapus semua data pada session
		$this->session->destroy();

		// redirect ke halaman login	
		return redirect()->to(base_url('auth'));
	}
}
