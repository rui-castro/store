<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Get the products that have this option.
     */
    public function products()
    {
        return $this->hasManyThrough(Product::class, ProductOption::class);
    }

    /**
     * Get all of the OptionValue for the Option.
     */
    public function values()
    {
        return $this->hasMany(OptionValue::class);
    }
}
