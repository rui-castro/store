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
     * Get the Bag that owns the BagLine.
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

    public function getProductAttribute() {
        return $this->variant->product;
    }

    public function getReferenceAttribute() {
        return $this->variant->product->reference;
    }

    public function getNameAttribute() {
        return $this->variant->product->name;
    }

    public function getImageURLAttribute() {
        return $this->variant->product->imageURL;
    }

    public function getValuesAttribute() {
        return $this->variant->values;
    }

    public function getPriceAttribute() {
        return $this->variant->price;
    }
}
