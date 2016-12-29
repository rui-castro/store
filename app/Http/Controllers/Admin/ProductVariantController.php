<?php

namespace Store\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;
use Store\Product;
use Store\Repositories\ProductRepository;
use Store\Variant;
use Store\VariantValue;

class ProductVariantController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @param int $product_id the Product ID.
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = Product::find($product_id);

        $values = array();
        foreach ($product->options as $option) {
            $value = new VariantValue();
            $value->option = $option;
            $values[] = $value;
        }

        $variant = new Variant();
        $variant->product = $product;
        $variant->values = $values;

        return view('admin.variants.create', [
            'product' => $product,
            'variant' => $variant
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
            'product_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'values.*.option_value_id' => 'required|integer'
        ]);

        $this->products->createVariant($request->all());

        return redirect(route('admin.products.edit', ['id' => $request->input('product_id')], false) . '#variants');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.variants.edit', [
            'variant' => Variant::find($id)
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
            'product_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'values.*.option_value_id' => 'required|integer'
        ]);

        $this->products->updateVariant($id, $request->all());

        return redirect(route('admin.products.edit', ['id' => $request->input('product_id')], false) . '#variants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $productId
     * @param  int $variantId
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId, $variantId)
    {
        Variant::destroy($variantId);
        return redirect(route('admin.products.edit', ['id' => $productId], false) . "#variants");
    }
}
