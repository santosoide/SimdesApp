<?php namespace SimdesApp\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     *
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            // get the level of user
            $level = \Auth::user()->level;
            // if >= 200 = backoffice
            if ($level >= 200) {
                return redirect('/');
            }

            // if < 200 = frontoffice
            return redirect('/front');
        }

        return $next($request);
    }
}
