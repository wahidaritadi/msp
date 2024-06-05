<?php

namespace App\Controllers;

use App\Models\ProductModel;
class Pages extends BaseController
{
   protected $productModel;
   public function __construct()
   {

      $this->productModel = new ProductModel();
   }

   public function index()
   {

      $data['items'] = $this->productModel->findAll();
      // menampilkan halaman view product dan membawa variabel data
      return view('pages/home', $data);
   }

   public function about()
   {
      $data = [
         'title' => 'About Me'
      ];
      return view('pages/about', $data);
   }

   public function contact()
   {
      $data = [
         'title' => 'Contact Us',
         'alamat' => [
            [
               'tipe' => 'Rumah',
               'alamat' => 'Jl. Magelang No.456',
               'kota' => 'Magelang'
            ],
            [
               'tipe' => 'Kantor',
               'alamat' => 'Jl. Yogyakarta No.6',
               'kota' => 'Yogyakarta'
            ]
         ]
      ];
      return view('pages/contact', $data);
   }
}
