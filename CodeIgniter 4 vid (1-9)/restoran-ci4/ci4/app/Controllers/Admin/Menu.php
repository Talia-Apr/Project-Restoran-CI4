<?php namespace App\Controllers;

class Menu extends BaseController
{
	public function index()
	{
		return view('welcome_message');
    }
    
    public function select(){
        echo "<h3>Untuk Menampilkan Data</h3>";
    }

    public function update ($id=null,$nama=null){
        echo "<h4>Untuk Update Data dengan id : $id  $nama </h4>"  ;
    }

	//--------------------------------------------------------------------

}
