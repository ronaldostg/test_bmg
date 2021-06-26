<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;

use Config\View;



class AdminController extends BaseController
{
	public function index()
	{
		echo view('admin/login');
	}


	public function auth()
	{
		$session = session();
		$model = new AdminModel();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');

		$data = $model->where('username', $username)->first();

		if ($data) {
			$pass = $data['password'];


			if ($pass == $password) {

				$ses_data = [
					'user_id' => $data['user_id'],
					'username' => $data['username'],
				];
				$session->set($ses_data);
				return redirect()->to(base_url('list_artikel'));
			} else {
				return redirect()->to(base_url('/login'));
			}
		} else {
			return redirect()->to(base_url('/login'));
		}
	}




	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/login'));
	}
}
