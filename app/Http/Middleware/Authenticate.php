<?php namespace SimdesApp\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class Authenticate
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
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response([
                    'success' => false,
                    'action'  => 'redirect',
                    'path'    => 'login',
                    'message' => 'Session anda telah habis, silahkan login kembali'
                ], 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
