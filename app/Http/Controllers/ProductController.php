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
        parent::__construct();
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
            'products' => $this->products->allWithVariantsWhere($request),
            'filters' => [
                $this->products->columnFilter($request, 'collection', 'Collection'),
                $this->products->columnFilter($request, 'type', 'Typology')
            ]
        ]);
    }

    /**
     * Display a product.
     *
     * @param $id integer the product ID.
     * @return Response
     */
    public function show($id)
    {
        $product = $this->products->get($id);
        return view('products.show', [
            'product' => $product,
            'variant' => $product->variants()->first()
        ]);
    }

}
