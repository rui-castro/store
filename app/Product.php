<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
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
        // return $this->hasManyThrough(Option::class, ProductOption::class);
        return $this->belongsToMany(Option::class, 'product_options');
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
        return $variant ? $variant->price + 0 : null;
    }

    /**
     * Get the maximum price of the product.
     */
    public function maximumPrice()
    {
        $variant = $this->variants()->orderBy('price', 'desc')->first();
        return $variant ? $variant->price + 0 : null;
    }

    /**
     * Attribute 'imageURL' accessible with '->imageURL'.
     *
     * @return string the product image URL.
     */
    public function getImageURLAttribute()
    {
        return $this->image_file_path ? Storage::url($this->image_file_path) : null;
    }

}
