<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'name',
        'description',
        'type',
        'collection',
        'notes',
    ];

    /**
     * Get all of the options for this product.
     */
    public function options()
    {
        return $this->hasManyThrough(Option::class, ProductOption::class);
    }

    /**
     * Get all of the variants for the product.
     */
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    /**
     * Get the minimum price of the product.
     */
    public function minimumPrice()
    {
        $variant = $this->variants()->orderBy('price', 'asc')->first();
        return $variant ? $variant->price : null;
    }

    /**
     * Get the maximum price of the product.
     */
    public function maximumPrice()
    {
        $variant = $this->variants()->orderBy('price', 'desc')->first();
        return $variant ? $variant->price : null;
    }

    /**
     * Get the product image URL.
     *
     * @return string
     */
    public function imageURL()
    {
        return Storage::url($this->image_file_path);
    }
}
