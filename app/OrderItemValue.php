<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class OrderItemValue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_item_id',
        'name',
        'value',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_item_id' => 'int',
    ];

    /**
     * Get the OrderItem that owns the OrderItemValue.
     */
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    /**
     * Constructs a new OrderItemValue from a VariantValue.
     * @param VariantValue $variantValue the VariantValue.
     * @return OrderItemValue the created OrderItemValue.
     */
    public static function fromVariantValue(VariantValue $variantValue)
    {
        return new OrderItemValue([
            'name' => $variantValue->name,
            'value' => $variantValue->value,
        ]);
    }
}
