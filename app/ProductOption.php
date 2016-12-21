<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
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
    protected $casts = [
        'product_id' => 'int',
        'option_id' => 'int',
    ];

    /**
     * Get the Product that owns the ProductOption.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the Option that owns the ProductOption.
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

}
