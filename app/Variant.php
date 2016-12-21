<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sku', 'price'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'int',
    ];

    /**
     * Get the Product that owns the Variant.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all of the VariantValue for the Variant.
     */
    public function values()
    {
        return $this->hasMany(VariantValue::class);
    }
}
