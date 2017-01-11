<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class BagItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'variant_id',
        'quantity'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'bag_id' => 'int',
        'variant_id' => 'int',
    ];

    /**
     * Get the Bag that owns the BagItem.
     */
    public function bag()
    {
        return $this->belongsTo(Bag::class);
    }

    /**
     * Get the Variant.
     */
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    /**
     * Attribute 'product' accessible with '->product'.
     *
     * @return Product the Product.
     */
    public function getProductAttribute()
    {
        return $this->variant->product;
    }

    /**
     * Attribute 'reference' accessible with '->reference'.
     *
     * @return string the Variant Product reference.
     */
    public function getReferenceAttribute()
    {
        return $this->variant->product->reference;
    }

    /**
     * Attribute 'name' accessible with '->reference'.
     *
     * @return string the Variant Product name.
     */
    public function getNameAttribute()
    {
        return $this->variant->product->name;
    }

    /**
     * Attribute 'imageURL' accessible with '->imageURL'.
     *
     * @return string the Variant Product image URL.
     */
    public function getImageURLAttribute()
    {
        return $this->variant->product->imageURL;
    }

    /**
     * Attribute 'values' accessible with '->values'.
     *
     * @return array the Variant's VariantValue array.
     */
    public function getValuesAttribute()
    {
        return $this->variant->values;
    }

    /**
     * Attribute 'price' accessible with '->price'.
     *
     * @return float the Variant price.
     */
    public function getPriceAttribute()
    {
        return $this->variant->price * $this->quantity;
    }
}
