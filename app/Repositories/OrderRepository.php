<?php

namespace Store\Repositories;

use Store\Order;
use Store\OrderItem;

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
        $order = Order::create($attributes);
        foreach (BagRepository::getCurrent()->items as $bag_item) {
            $order->items()->save(OrderItem::fromBagItem($bag_item));
        }
        return $order;
    }

}
