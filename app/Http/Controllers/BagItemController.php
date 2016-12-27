<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Store\Repositories\BagRepository;

class BagItemController extends Controller
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
     * Create a new BagItem.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'bag_id' => 'required|integer',
            'variant_id' => 'required|integer',
            'quantity' => 'integer',
        ]);

        $bag_item = $this->bags->addItem($request->all());
        return redirect($request->input('return_url', url('/')));
    }

    /**
     * Create a new BagItem.
     *
     * @param Request $request
     * @param integer $id the BagItem ID.
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $this->bags->removeItem($id);
        return redirect($request->input('return_url', url('/')));
    }

}
