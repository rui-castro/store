<?php

namespace Store\Repositories;

use Store\Bag;
use Store\BagItem;

class BagRepository
{
    /**
     * Get the current Bag (from session).
     * If session does not have a Bag, a new one will be created and inserted into the session.
     *
     * @return Bag the Bag.
     */
    public static function getCurrent()
    {
        $bag = null;
        $bag_id = session('bag_id');
        if ($bag_id) {
            $bag = Bag::find($bag_id);
        }
        if (!$bag) {
            $bag = Bag::create();
            session(['bag_id' => $bag->id]);
        }
        return $bag;
    }

    /**
     * Get a Bag.
     *
     * @param $id integer the bag ID.
     * @return Bag
     */
    public function get($id)
    {
        return Bag::find($id);
    }

    /**
     * Add a new BagItem into the current Bag.
     *
     * @param $attributes array the BagItem attributes.
     * @return BagItem the newly created BagItem.
     */
    public function addItem($attributes)
    {
        // Don't understand why _token must be removed here, but not in ProductController#store!
        unset($attributes['_token']);

        $bag = $this->getCurrent();
        $bag_item = $bag->items()->where('variant_id', $attributes['variant_id'])->first();
        if ($bag_item) {
            $bag_item->quantity += $attributes['quantity'];
        } else {
            $bag_item = $bag->items()->create($attributes);
        }
        return $bag_item;
    }

    public function removeItem($id)
    {
        $bag_item = $this->getCurrent()->items()->where('id', $id);
        if ($bag_item) {
            $bag_item->delete();
        }
    }

}
