<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}