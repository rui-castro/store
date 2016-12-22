<?php

namespace Store\Repositories;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
     * @param $attributes Product attributes.
     * @return Product the created Product.
     */
    public static function create($attributes)
    {
        return ProductRepository::attachImage(Product::create($attributes), $attributes['image']);
    }

    /**
     * Create a new Product from a Request.
     * @param $product Product the Product.
     * @param $image UploadedFile the image.
     * @return Product the Product.
     */
    public static function attachImage($product, $image)
    {
        $product->image_file_path = Storage::putFile("products/{$product->id}/images", $image, 'public');
        $product->image_file_name = $image->getClientOriginalName();
        $product->image_file_size = $image->getClientSize();
        $product->image_content_type = $image->getClientMimeType();
        $product->image_updated_at = Carbon::now();
        $product->save();

        return $product;
    }
}
