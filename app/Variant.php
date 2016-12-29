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
    protected $fillable = [
        'price'
    ];

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

    /**
     * Get a string with the information about the Variant values.
     */
    public function valuesAsString()
    {
        $values = array();
        foreach ($this->values as $value) {
            $values[] = "{$value->name}: {$value->value}";
        }
        return implode(" | ", $values);
    }

    /**
     * Get the VariantValue for the given Option.
     *
     * @param Option $option the Option.
     * @return VariantValue the VariantValue.
     */
    public function value(Option $option)
    {
        $variant_value = $this->values->where('option_id', $option->id)->first();
        return $variant_value ? $variant_value->value : null;
    }

}
