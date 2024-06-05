<?php

namespace App\Controllers;


use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;
    public function __construct()
    {

        $this->productModel = new ProductModel();
    }

    public function index()
    {
        // membuat variabel untuk menampung session cart
        $session = session('cart');
        // membuat variabel total yang isinya mengecek ada atau tidak
        // variabel session dan memasukannya ke dalam array values
        // jika session cart tidak ada, tampilkan array() / kosong
        $data['total'] = is_array($session) ? array_values($session) : array();
        // menampilkan semua data product yang ada di dalam database
        $data['items'] = $this->productModel->findAll();
        // menampilkan halaman view product dan membawa variabel data
        return view('product/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Produk',
            'product' => $this->productModel->getProduct($slug)
        ];
        $data['items'] = $this->productModel->orderBy('id', 'DESC')->find([2, 3, 4, 5]);
        // jika komik tidak ada di tabel
        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang ' . $slug . 'is Not Found.');
        }

        return view('product/detail', $data);
    }

}
