<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'notes',
    ];

    /**
     * Get all of the OrderItem for the Order.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Attribute 'price' accessible with '->price'.
     *
     * @return float the Order total price.
     */
    public function getPriceAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }
}
