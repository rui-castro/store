<?php

namespace Store\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\Log;

class AdminAuthorization
{
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('$this->auth->user(): ' . print_r($this->auth->user(), true));

        if ($this->auth->user()->admin) {
            Log::debug('$this->auth->user()->admin: TRUE');
        } else {
            Log::debug('$this->auth->user()->admin: FALSE');
        }

        if (!$this->auth->user()->admin) {
            return redirect(route('root', [], false));
        }

        return $next($request);
    }
}
