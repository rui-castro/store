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

    /**
     * Display a form to create a new product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Create a new product.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'reference' => 'required|unique:products|max:255',
            'name' => 'required|max:255',
        ]);

        $product = $this->products->create($request->all());

        return redirect(route('products.show', ['id' => $product->id], false));
    }

}
