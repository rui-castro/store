<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
use Store\Repositories\ProductRepository;

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
            'products' => $this->products->allWithVariants()
        ]);
    }

    /**
     * Display a form to create a new product.
     *
     * @param  Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('products.create');
    }

    /**
     * Create a new product.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $product = $this->products->create($request);

        return redirect('/products');
    }
}
