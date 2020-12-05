<?php namespace App\Controllers;

use App\Models\Kategori_M;
use App\Models\Pelanggan_M;

class Login extends BaseController
{
	public function index()
	{
		$model_kategori = new Kategori_M();
		$data = ['kategori' => $model_kategori->findAll()];

		if ($this->request->getMethod() == 'post') {
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			echo $email;

			$model_pelanggan = new Pelanggan_M();
			$pelanggan = $model_pelanggan->where(['email' => $email, 'aktif' => 1])->first();

			if (empty($pelanggan)) {
				$data['info'] = "Email Salah!";
			} else {
				if (password_verify($password, $pelanggan['password'])) {
					$this->setSession($pelanggan);
					return redirect()->to(base_url());
				} else {
					$data['info'] = "Password Salah!";
				}
			}
		} else {
			# code...
		}

		return view('Home/login', $data);
	}

	public function setSession($pelanggan)
	{
		$data = [
			'pelanggan' => $pelanggan['pelanggan'],
			'email' => $pelanggan['email'],
			'idpelanggan' => $pelanggan['idpelanggan'],
			'logIn' => true
		];

		session()->set($data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url());
	}

	//--------------------------------------------------------------------

}