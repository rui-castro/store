<?php

namespace Store\Http\Controllers\Admin;

use Store\Http\Controllers\Controller;
use Store\Repositories\OrderRepository;

class OrderController extends Controller
{
    /**
     * The OrderRepository instance.
     *
     * @var OrderRepository
     */
    protected $orders;

    /**
     * Create a new controller instance.
     *
     * @param OrderRepository $orders
     */
    public function __construct(OrderRepository $orders)
    {
        parent::__construct();
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => $this->orders->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.orders.show', [
            'order' => $this->orders->get($id)
        ]);
    }

}
