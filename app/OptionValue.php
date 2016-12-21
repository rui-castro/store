<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'option_id' => 'int',
    ];

    /**
     * Get the Option that owns the OptionValue.
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

}
