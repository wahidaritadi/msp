<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $table = 'products';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'name', 'slug', 'price', 'description', 'photo'];

    public function getProduct($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
