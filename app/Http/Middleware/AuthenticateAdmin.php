<?php

namespace CodeCommerce\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Closure;

class AuthenticateAdmin
{
    /**
     * @var Guard
     */
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->is_admin != 1){
            Session::flash('message-error', 'Você não tem privilegios, para acessar esta area.');
            return redirect()->to('home');
        }
        return $next($request);
    }
}
