<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
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
            'email' => 'required|email|max:255',
            // 'notes' => '',
        ]);

        $order = $this->orders->create($request->all());

        Mail::to($order->email, $order->name)->send(new OrderReceived($order));

        return redirect(route('orders.show', ['id' => $order->id], false));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('orders.show', [
            'order' => $this->orders->get($id),
        ]);
    }

}
