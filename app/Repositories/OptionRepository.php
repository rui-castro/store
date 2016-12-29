<?php

namespace Store\Repositories;

use Store\Option;

class OptionRepository
{
    /**
     * @return array all options.
     */
    public function all()
    {
        return Option::all();
    }

    /**
     * Get an Option.
     *
     * @param integer $id the Option ID.
     * @return Option
     */
    public function get($id)
    {
        return Option::find($id);
    }

    /**
     * Create a new Option from a Request.
     * @param array $attributes Option attributes.
     * @return Option the created Option.
     */
    public static function create($attributes)
    {
        return Option::create($attributes);
    }

    /**
     * Update an existing Option from attributes.
     *
     * @param integer $id the Option ID.
     * @param array $attributes Option attributes.
     * @return Option the updated Option.
     */
    public function update($id, $attributes)
    {
        $product = Option::find($id);
        $product->fill($attributes);
        $product->save();
        return $product;
    }

}
