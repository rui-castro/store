<?php

namespace Store\Repositories;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Store\Product;

class ProductRepository
{
    /**
     * @return array all products ordered by descending creation date.
     */
    public function all()
    {
        return Product::orderBy('created_at', 'desc')->get();
    }

    /**
     * @return array all products with a price ordered by descending creation date.
     */
    public function allWithVariants()
    {
        return Product::has('variants')->orderBy('created_at', 'desc')->get();
    }

    /**
     * Create a new Product from a Request.
     * @param $request Request the request.
     * @return Product the created Product.
     */
    public function create($request)
    {
        $product = Product::create($request->all());

        $uploadedFile = $request->file('image');
        $product->image_file_path = Storage::putFile("products/{$product->id}/images", $uploadedFile);
        $product->image_file_name = $uploadedFile->getClientOriginalName();
        $product->image_file_size = $uploadedFile->getClientSize();
        $product->image_content_type = $uploadedFile->getClientMimeType();
        $product->image_updated_at = Carbon::now();
        $product->save();

        return $product;
    }
}
