<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get all of the BagItem for the Bag.
     */
    public function items()
    {
        return $this->hasMany(BagItem::class);
    }

    /**
     * Is the bag empty?
     * @return bool true if the bag is empty, false otherwise.
     */
    public function isEmpty()
    {
        return $this->items->count() == 0;
    }

    /**
     * Attribute 'price' accessible with '->price'.
     *
     * @return float the Bag total price.
     */
    public function getPriceAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }

    /**
     * Attribute 'totalCount' accessible with '->totalCount'.
     *
     * @return int the total number of items in the Bag.
     */
    public function getTotalCountAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity;
        }
        return $total;
    }

    /**
     * Remove all items from the Bag.
     */
    public function clear()
    {
        $this->items()->delete();
    }
}
