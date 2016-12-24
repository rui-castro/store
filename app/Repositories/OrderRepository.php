<?php

namespace Store\Repositories;

use Store\Order;

class OrderRepository
{
    /**
     * @return array all products ordered by descending creation date.
     */
    public function all()
    {
        return Order::orderBy('created_at', 'desc')->get();
    }

    /**
     * Get an Order.
     *
     * @param integer $id the Order ID.
     * @return Order
     */
    public function get($id)
    {
        return Order::find($id);
    }

    /**
     * Create a new Order from a Request.
     * @param array $attributes Order attributes.
     * @return Order the created Order.
     */
    public static function create($attributes)
    {
        return Order::create($attributes);
    }

}
