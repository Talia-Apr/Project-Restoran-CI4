<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\Pelanggan_M;
use App\Models\OrderDetail_M;

class HomePage extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$model_kategori = new Kategori_M();
		$model_menu = new Menu_M();
		
        $data =[
            'kategori'=>$model_kategori->findAll(),
			'menu'=>$model_menu->paginate(3, 'page'),
            'pager' => $model_menu->pager
		];
		
        return view('Home/produk', $data);
	}

	public function read($id=null)
	{
		$pager = \Config\Services::pager();

        if (isset($id)) {
			$model_menu = new Menu_M();
			$model_kategori = new Kategori_M();
            $jumlah = $model_menu->where('idkategori', $id)->findAll();
            $count = count($jumlah);

            $tampil = 3;
            $mulai = 0;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $mulai = ($tampil * $page) - $tampil;
            }

            $menu = $model_menu->where('idkategori', $id)->findAll($tampil, $mulai);

            $data = [
				'menu' => $menu,
				'kategori' => $model_kategori->findALL(),
                'pager' => $pager,
                'tampil' => $tampil,
				'total' => $count,
				'id' => $id
            ];
            
            return view("Home/cari",$data);
        }
    }

    public function create()
    {
        $model_kategori = new Kategori_M();
        $data = [
            'kategori' => $model_kategori->findAll()
        ];
        return view('Home/daftar', $data);
    }

    public function daftar()
    {
        $request = \Config\Services::request();
        
        $data = [
            'pelanggan' => $request->getPost('pelanggan'),
            'alamat' => $request->getPost('alamat'),
            'telp' => $request->getPost('telp'),
            'email' => $request->getPost('email'),
            'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
            'konfirmasi' => password_hash($request->getPost('konfirmasi'), PASSWORD_DEFAULT),
            'aktif' => 1
        ];

        $model_pelanggan = new Pelanggan_M();

        if ($request->getPost('password')==$request->getPost('konfirmasi')) {
            if ($model_pelanggan->insert($data)===false) {
                $error = $model_pelanggan->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(base_url("/front/homepage/create"));
            } else {
                return redirect()->to(base_url("/login"));
            }
        } else {
            $error = ['password'=>'Password Dan Konfirmasi harus sama!'];
            session()->setFlashdata('info', $error);
            return  redirect()->to(base_url('/front/homepage/create'));
        }
        
    }

    public function histori()
    {
        $model_kategori = new Kategori_M();
        $db    = \Config\Database::connect();

        $vorder = $db->table('vorder');
        $email = session()->get('email');
        $result = $vorder->getWhere(['email' => $email]);

        $halaman = $result->getResult('array');
        $count = count($halaman);

        $result = $vorder->getWhere(['email' => $email]);
        $vo = $result->getResult('array');

        $data = [
            'kategori' => $model_kategori->findAll(),
            'vorder' => $vo,
            'total' => $count
        ];

        return view("Home/histori", $data);
    }

    public function detail($id)
    {
        $db    = \Config\Database::connect();
        $model_kategori = new Kategori_M();
        $model_orderdetail = new OrderDetail_M();

        $jumlah = $model_orderdetail->where('idorder', $id)->findAll();
        $count = count($jumlah);

        $detail = $model_orderdetail->where('idorder', $id)->findAll();

        $data = [
            'detail' => $detail,
            'kategori' => $model_kategori->findAll(),
        ];

        return view('Home/detail', $data);
    }
	
	//--------------------------------------------------------------------
}
