<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\Kategori_M;
use App\Models\Menu_M;
use App\Models\Order_M;
use App\Models\OrderDetail_M;
use App\Models\OrderDetail2_M;

class Beli extends BaseController
{
    public function index($id = null)
    {
        $model_kategori = new Kategori_M();
        $model_menu = new Menu_M();
        $total = 0;

        if (isset($id)) {
            $this->isi($id);
            return redirect()->to(base_url('/front/beli'));
        } else {
            foreach (session()->get() as $key => $value) {
                if ( 
                    $key<>'__ci_last_regenerate' && $key<>'_ci_previous_url' && $key<>'pelanggan' 
                    && $key<>'email' && $key<>'idpelanggan'
                ) {
                    $id = substr($key, 1);
                    $menu[] = $model_menu->where('idmenu', $id)->findAll();
                    $jumlah[] = $value;
                }
            }
        }

        if (!isset($menu)) {
            $menu = [];
            $jumlah = [];
        }
        
        $data = [
            'kategori' => $model_kategori->findAll(),
            'menu' => $menu,
            'jumlah' => $jumlah,
            'total' => $total
        ];

        return view('Home/cart', $data);
    }

    public function isi($id)
    {
        if (session()->has('_'.$id)) {
            session()->set('_'.$id, session()->get('_'.$id)+1);
        } else {
            session()->set('_'.$id, 1);
        }
    }

    public function tambah($id = null)
    {
        session()->set('_' . $id, session()->get('_' . $id) + 1);
        return redirect()->to(base_url('/front/beli'));
    }

    public function kurang($id = null)
    {
        $idmenu = '_' . $id;
        session()->set($idmenu, session()->get($idmenu) - 1);
        if (session()->get($idmenu) == 0) {
            session()->remove($idmenu);
        }
        return redirect()->to(base_url('/front/beli'));
    }

    public function hapus($id = null)
    {
        $idmenu = '_'.$id;
        session()->remove($idmenu);
        return redirect()->to(base_url('/front/beli'));
    }

    public function checkout($total = null)
    {
        $db    = \Config\Database::connect();

        if (isset($total)) {
            $idorder = $this->idorder();
            $idpelanggan = session()->get('idpelanggan');
            $tgl = date('Y-m-d');
            $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";
            $result = $db->query($sql);
            $detail = $result->getResult('array');
            $count = count($detail);

            if ($count == 0) {
                $this->insertOrder($idorder, $idpelanggan, $tgl, $total);
                $this->insertOrderDetail($idorder);
            } else {
                $this->insertOrderDetail($idorder);
            }
            $this->kosonganSession();
            return redirect()->to(base_url('/front/beli/checkout/'));
        } else {

            $id = $this->idorder() + 1;
            $model_kategori = new Kategori_M();

            $data = [
                'kategori' => $model_kategori->findAll(),
                'id' => $id,
            ];

            return view('Home/info', $data);
        }
    }

    public function idorder()
    {
        $db    = \Config\Database::connect();

        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $result = $db->query($sql);
        $detail = $result->getResult('array');
        $count = count($detail);

        if ($count == 0) {
            $id = 1;
        } else {
            $id = $count + 1; 
        }
        return $id;
    }

    public function insertOrder($idorder, $idpelanggan, $tgl, $total)
    {
        $db    = \Config\Database::connect();
        $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total,0,0,0)";
        $db->query($sql);
    }

    public function insertOrderDetail($idorder)
    {
        $model_menu = new Menu_M();
        $model_orderdetail = new OrderDetail2_M();

        foreach (session()->get() as $key => $value) {
            if (
                $key<>'__ci_last_regenerate' && $key<>'_ci_previous_url' && $key<>'pelanggan' 
                && $key<>'email' && $key<>'idpelanggan'
            ) {
                $id = substr($key, 1);
                $produk = $model_menu->where('idmenu', $id)->findAll();
                foreach ($produk as $key) {
                    $idmenu = $key['idmenu'];
                    $harga = $key['harga'];
                    $data = [
                        'idorder' => $idorder,
                        'idmenu' => $idmenu,
                        'jumlah' => $value,
                        'hargajual' => $harga
                    ];
                    $model_orderdetail->insert($data);
                }
            }
        }
    }

<<<<<<< Updated upstream
}
=======
    public function kosonganSession()
    {
        foreach (session()->get() as $key => $value) {
            if (
                $key<>'__ci_last_regenerate' && $key<>'_ci_previous_url' && $key<>'pelanggan' 
                && $key<>'email' && $key<>'idpelanggan'
            ) {
                $id = substr($key, 1);
                session()->remove('_'.$id);
            }
        }
    }

}
>>>>>>> Stashed changes
