<?php

namespace Store\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $closed = filter_var(env('APP_CLOSED', 'false'), FILTER_VALIDATE_BOOLEAN);
        if ($closed) {
            $this->middleware('auth');
        }
    }

}
