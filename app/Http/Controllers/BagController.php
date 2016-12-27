<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Response;
use Store\Repositories\BagRepository;

class BagController extends Controller
{
    /**
     * The bag repository instance.
     *
     * @var BagRepository
     */
    protected $bags;

    /**
     * Create a new controller instance.
     *
     * @param BagRepository $bags
     */
    public function __construct(BagRepository $bags)
    {
        parent::__construct();
        $this->bags = $bags;
    }

    /**
     * Display the current Bag.
     *
     * @return Response
     */
    public function show()
    {
        return view('bags.show', [
            'bag' => $this->bags->getCurrent(),
        ]);
    }

}
