<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'variant_id',
        'reference',
        'name',
        'quantity',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'int',
        'variant_id' => 'int',
    ];

    /**
     * Get the Order that owns the OrderItem.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the Variant.
     */
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    /**
     * Get all of the OrderItemValue for the OrderItem.
     */
    public function values()
    {
        return $this->hasMany(OrderItemValue::class);
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
     * Attribute 'imageURL' accessible with '->imageURL'.
     *
     * @return string the Variant Product image URL.
     */
    public function getImageURLAttribute()
    {
        return $this->product->imageURL;
    }

    /**
     * Constructs a new OrderItem from a BagItem.
     * @param BagItem $bag_item the BagItem.
     * @return OrderItem the created OrderItem.
     */
    public static function fromBagItem(BagItem $bag_item)
    {
        $order_item = new OrderItem([
            'variant_id' => $bag_item->variant_id,
            'reference' => $bag_item->reference,
            'name' => $bag_item->name,
            'quantity' => $bag_item->quantity,
            'price' => $bag_item->variant->price,
        ]);
        return $order_item;
    }
}
