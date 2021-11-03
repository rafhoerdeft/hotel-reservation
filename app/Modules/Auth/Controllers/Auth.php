<?php

namespace App\Modules\Auth\Controllers;

use App\Modules\Auth\Controllers\BaseController;

class Auth extends BaseController
{

	public function index()
	{
		$this->session->destroy();
		return views('login', 'Auth', $this->v_data);
	}

	public function cek_login()
	{
		helper('recaptcha');

		$res = recaptcha();
		// if ($res['success'] == 1 && $res['score'] >= 0.5) {
		if ($res['success']) {

			$username = htmlspecialchars_decode($this->request->getVar('username'));
			$password = htmlspecialchars_decode($this->request->getVar('password'));
			$pass = md5($password);

			$where = array(
				'username' => $username,
				'password' => $pass,
				'active' => 1
			);

			$hasil = $this->MasterData->getWhereDataAll('tbl_user', $where);

			if (count($hasil->getResultArray()) == 1) {
				$id_role = $hasil->getRow()->id_role;

				$data_role = $this->MasterData->getWhereData('*', 'tbl_role', "id_role = $id_role")->getRow();

				$role = $data_role->nama_role;

				$sess_data['id_user'] 	= $hasil->getRow()->id_user;
				$sess_data['nama_user'] = $hasil->getRow()->nama_user;
				$sess_data['username'] 	= $hasil->getRow()->username;
				$sess_data['id_role']   = $id_role;
				$sess_data['role'] 		= $role;
				$sess_data['logs'] 		= 'SimEpikir' . ucfirst(strtolower($role));

				$ipaddress = get_client_ip();
				$data = array(
					'id_user' 		=> $hasil->getRow()->id_user,
					'ip_address' 	=> $ipaddress,
					'waktu_logs' 	=> date('Y-m-d H:i:s'),
				);
				$this->MasterData->inputData($data, 'tbl_logs');
				$sess_data['id_logs'] = $this->db->insertID();

				$this->session->set($sess_data);

				$datas = ['success' => true, 'role' => $role, 'link' => base_url(strtolower($role))];
			} else {
				$datas = ['success' => false, 'alert' => 'Username atau password salah.'];
			}
		} else {
			$datas = ['success' => false, 'alert' => 'reCaptcha belum terverifikasi'];
		}

		echo json_encode($datas);
	}

	public function logout()
	{
		// Hapus semua data pada session
		$this->session->destroy();

		// redirect ke halaman login	
		return redirect()->to(base_url('auth'));
	}
}
