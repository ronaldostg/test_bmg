<?php

namespace App\Controllers;

class Coba extends BaseController
{
	public function index()
	{
		echo "nama saya ani";
	}

    public function about($nama='', $umur=0)
	{
		echo "about page".$nama.'umur'.$umur;
	}
}
