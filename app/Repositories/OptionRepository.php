<?php

namespace Store\Repositories;

use Store\Option;
use Store\OptionValue;

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
        $option = Option::find($id);
        $option->fill($attributes);
        $option->save();
        return $option;
    }

    /**
     * Create a OptionValue.
     *
     * @param integer $optionId the Option ID.
     * @param array $attributes the attributes.
     * @return OptionValue the created OptionValue.
     */
    public function createValue($optionId, $attributes)
    {
        return Option::find($optionId)->values()->create($attributes);
    }

    /**
     * Update an existing OptionValue from attributes.
     *
     * @param integer $id the OptionValue ID.
     * @param array $attributes OptionValue attributes.
     * @return OptionValue the updated OptionValue.
     */
    public function updateValue($id, $attributes)
    {
        $optionValue = OptionValue::find($id);
        $optionValue->fill($attributes);
        $optionValue->save();
        return $optionValue;
    }

}
