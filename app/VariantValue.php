<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class VariantValue extends Model
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
        'variant_id' => 'int',
        'option_id' => 'int',
        'option_value_id' => 'int',
    ];

    /**
     * Get the Variant that owns the VariantValue.
     */
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    /**
     * Get the Option that owns the VariantValue.
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    /**
     * Get the OptionValue that owns the VariantValue.
     */
    public function optionValue()
    {
        return $this->belongsTo(OptionValue::class);
    }

    /**
     * Get the name of the Option.
     */
    public function getNameAttribute()
    {
        return $this->option->name;
    }

    /**
     * Get the value of the OptionValue.
     */
    public function getValueAttribute()
    {
        return $this->optionValue->value;
    }

}
