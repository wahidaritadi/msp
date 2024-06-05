<?php

namespace App\Controllers;
use App\Models\Product_model;
use App\Models\ProductModel;

class Home extends BaseController
{
	protected $productModel;
	public function __construct()
	{

		$this->productModel = new ProductModel();
	}

	public function index()
	{
		return view('welcome_message');
	}

	public function coba()
	{
		echo $this->nama;
	}

	//--------------------------------------------------------------------

}
