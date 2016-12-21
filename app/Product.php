<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        return $this->variants()->orderBy('price', 'asc')->first()->price;
    }

    /**
     * Get the maximum price of the product.
     */
    public function maximumPrice()
    {
        return $this->variants()->orderBy('price', 'desc')->first()->price;
    }
}
