<?php

namespace Store\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;
use Store\Product;
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
        // parent::__construct();
        $this->middleware('auth');
        $this->middleware('auth.admin');
        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' => $this->products->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', [
            'product' => new Product()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'reference' => 'required|unique:products|max:255',
            'name' => 'required|max:255',
        ]);

        $product = $this->products->create($request->all());
        $product->options()->sync($request->input('options') == null ? [] : $request->input('options'));

        return redirect(route('admin.products.index', [], false));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.products.edit', [
            'product' => $this->products->get($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'reference' => "required|unique:products,reference,$id|max:255",
            'name' => 'required|max:255',
        ]);

        $product = $this->products->update($id, $request->all());
        $product->options()->sync($request->input('options') == null ? [] : $request->input('options'));

        return redirect(route('admin.products.index', [], false));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->products->destroy($id);
        return redirect(route('admin.products.index'));
    }
}
