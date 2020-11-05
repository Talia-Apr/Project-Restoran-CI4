<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		return view('welcome_message');
    }
    
    public function select()
    {

        $model = new Kategori_M;
        $kategori = $model -> findAll();

        $data = [
            'judul'=>'Select Data dari Controller',
            'kategori'=> $kategori
        ];
        
        return view("Kategori/select",$data);
        
    }
    
    public function selectWhere($id=null)
    {
        echo "<h2>Untuk menampilkan data yang dipilih $id</h2>";
    }

    public function formInsert()
    {

        return view("Kategori/forminsert");
        
    }

    public function formUpdate($id=null)
    {
        
        echo view("Kategori/update");
        
    }

    public function update($id=null)
    {
        echo "<h2>Untuk proses update data $id</h2>";
    }

    public function delete($id=null)
    {
        echo "<h2>Untuk proses delete data $id</h2>";
    }

	//--------------------------------------------------------------------

}
