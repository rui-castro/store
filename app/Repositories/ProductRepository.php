<?php

namespace Store\Repositories;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Store\OptionValue;
use Store\Product;
use Store\Variant;
use Store\VariantValue;

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
     * @param $request Request the request.
     * @return array all products with variants that match the given parameters, ordered by descending creation date.
     */
    public function allWithVariantsWhere($request)
    {
        return $this->getQueryAllWithVariantsWhere(
            $this->queryString2Parameters($request)
        )->get();
    }

    /**
     * Get a product.
     *
     * @param $id integer the product ID.
     * @return Product
     */
    public function get($id)
    {
        return Product::find($id);
    }

    /**
     * @param $request Request the request.
     * @param $column string the column name.
     * @param $title string the column title.
     * @return array
     */
    public function columnFilter($request, $column, $title = null)
    {
        $parameters = $this->queryString2Parameters($request);
        $queryCollections = $this->whereParameters(
            Product::has('variants')->select(DB::raw("$column as name, count(*) as count")),
            $parameters
        )->groupBy($column);

        $items = array();
        unset($parameters[$column]);
        $items[] = [
            'name' => 'All',
            'count' => 0,
            'url' => route('products.index') . '?' . $this->parameters2QueryString($parameters)
        ];
        foreach ($queryCollections->get() as $row) {
            $items[] = [
                'name' => $row->name,
                'count' => $row->count,
                'url' => route('products.index') . '?' . $this->parameters2QueryString($parameters, [$column => $row->name])
            ];
        }

        return [
            'name' => $column,
            'title' => $title ? $title : $column,
            'items' => $items
        ];
    }

    /**
     * Create a new Product from attributes.
     *
     * @param array $attributes Product attributes.
     * @return Product the created Product.
     */
    public function create($attributes)
    {
        $product = Product::create($attributes);
        if (isset($attributes['image'])) {
            $product = $this->attachImage($product, $attributes['image']);
        }
        return $product;
    }

    /**
     * Update an existing Product from attributes.
     *
     * @param integer $id the product ID.
     * @param array $attributes Product attributes.
     * @return Product the updated Product.
     */
    public function update($id, $attributes)
    {
        $product = Product::find($id);
        $product->fill($attributes);
        $product->save();
        if (isset($attributes['image'])) {
            $product = $this->attachImage($product, $attributes['image']);
        }
        return $product;
    }

    /**
     * Create a Variant.
     *
     * @param array $attributes the attributes.
     * @return Variant the created Variant.
     */
    public function createVariant($attributes)
    {
        $product = Product::find($attributes['product_id']);
        $variant = $product->variants()->create($attributes);

        if (array_key_exists('values', $attributes)) {
            foreach ($attributes['values'] as $value_attributes) {
                $value_attributes['option_id'] = OptionValue::find($value_attributes['option_value_id'])->option->id;
                $variant->values()->create($value_attributes);
            }
        }
        return $variant;
    }

    /**
     * Update an existing Variant from attributes.
     *
     * @param integer $id the Variant ID.
     * @param array $attributes Variant attributes.
     * @return Variant the updated Variant.
     */
    public function updateVariant($id, $attributes)
    {
        $variant = Variant::find($id);
        $variant->fill($attributes);
        $variant->save();
        foreach ($attributes['values'] as $value_attributes) {
            $value = VariantValue::find($value_attributes['id']);
            $value->fill($value_attributes);
            $value->save();
        }
        return $variant;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        if ($product->image_file_path) {
            Storage::delete($product->image_file_path);
        }
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

    private function getQueryAllWithVariantsWhere($parameters)
    {
        return $this->whereParameters(
            Product::has('variants'),
            $parameters
        )->orderBy('created_at', 'desc');
    }

    /**
     * @param $query Builder
     * @param $parameters array
     * @return mixed
     */
    private function whereParameters($query, $parameters)
    {
        foreach ($parameters as $key => $value) {
            $query = $this->where($query, $key, $value);
        }
        return $query;
    }

    /**
     * @param $query Builder
     * @param $key string
     * @param $value string
     * @return mixed
     */
    private function where($query, $key, $value)
    {
        if (is_array($value)) {
            $query = $query->whereIn($key, $value);
        } else if ($value) {
            $query = $query->where($key, $value);
        } else {
            Log::info("Ignoring undefined parameter value ($key => $value)");
        }
        return $query;
    }

    /**
     * @param $request Request
     * @return array
     */
    private function queryString2Parameters($request)
    {
        $queryString = $request->getQueryString();
        $params = array();
        if ($queryString) {
            $query = explode('&', $queryString);
            foreach ($query as $param) {
                list($name, $value) = explode('=', $param, 2);
                $params[urldecode($name)][] = urldecode($value);
            }
        }
        return $params;
    }

    /**
     * @param array $parameters
     * @param array $extra_params
     * @return string
     */
    private function parameters2QueryString($parameters, $extra_params = [])
    {
        $params = array_merge(array(), $parameters);

        if ($extra_params) {
            foreach ($extra_params as $key => $value) {
                if (!array_key_exists($key, $params)) {
                    $params[$key] = [];
                }
                $params[$key][] = $value;
            }
        }

        $single_pairs = array();
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $single) {
                    $single_pairs[] = urlencode($key) . "=" . urlencode($single);
                }
            } else {
                $single_pairs[] = urlencode($key) . "=" . urlencode($value);
            }
        }
        return implode("&", $single_pairs);
    }

}
