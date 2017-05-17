<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Session\Session;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = new Session();
        if($session->get('status')==='login'){
            return $next($request);
        }
        return redirect('login')
            ->withInput($request->except('password'))
            ->with('error','Session expired, please login to continue');

    }
}
