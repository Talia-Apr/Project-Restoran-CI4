<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		return view('welcome_message');
    }
    
    public function read()
    {
        $pager = \Config\Services::pager();

        $model = new Kategori_M;
        // $kategori = $model -> findAll();

        $data = [
            'judul'=>'Data Kategori',
            // 'kategori'=> $kategori
            'kategori' => $model->paginate(3, 'group1'),
            'pager' => $model->pager
        ];
        
        return view("Kategori/select",$data);
        
    }
    
    public function create()
    {
        return view("Kategori/insert");
    }
    
    public function insert()
    {
        $model = new Kategori_M();
        if ($model -> insert($_POST)===false) {
            $error = $model->errors();
            session()->setFlashdata('info', $error['kategori']);
            return redirect()->to(base_url("/admin/kategori/create"));
        } else {
            return redirect()->to(base_url("/admin/kategori"));
        }
        
    }

    public function find($id=null)
    {
        $model = new Kategori_M();
        $kategori = $model -> find($id);

        $data = [
            'judul'=>'Update Data',
            'kategori'=> $kategori
        ];

        return view("Kategori/update",$data);
    }

    public function update($id=null)
    {
        print_r($_POST);
        $model = new Kategori_M();
        $model -> save($_POST);

        return redirect()->to(base_url("/admin/kategori"));
    }

    public function delete($id=null)
    {
        $model = new Kategori_M();
        $model -> delete($id);

        return redirect()->to(base_url("/admin/kategori"));
    }

	//--------------------------------------------------------------------

}
