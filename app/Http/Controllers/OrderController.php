<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Store\Mail\OrderReceived;
use Store\Repositories\OrderRepository;

class OrderController extends Controller
{
    /**
     * The order repository instance.
     *
     * @var OrderRepository
     */
    protected $orders;

    /**
     * Create a new controller instance.
     *
     * @param  OrderRepository $orders
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
    // public function index(){}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            // 'email' => 'required|email|max:255',
            'email' => 'required',
            // 'notes' => '',
        ]);

        $order = $this->orders->create($request->all());
        $request->session()->put('order_id', $order->id);

        Mail::to(explode(',', $order->email), $order->name)->send(new OrderReceived($order));

        return redirect(route('orders.confirmation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function confirmation(Request $request)
    {
        return view('orders.confirmation', [
            'order' => $this->orders->get($request->session()->get('order_id')),
        ]);
    }

}
