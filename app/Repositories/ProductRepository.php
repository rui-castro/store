<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    /**
     * @return array all products ordered by descending creation date.
     */
    public function all()
    {
        return Product::orderBy('created_at', 'desc')->get();
    }
}
