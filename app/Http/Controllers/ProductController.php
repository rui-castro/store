<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * The product repository instance.
     *
     * @var ProductRepository
     */
    protected $products;

    /**
     * Create a new controller instance.
     *
     * @param  ProductRepository $products
     */
    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    /**
     * Display a list of all of the products.
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('products.index', [
            'products' => $this->products->all()
        ]);
    }
}
