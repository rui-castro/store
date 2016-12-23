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

    public function getPriceAttribute()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }
}
