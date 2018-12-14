<?php

namespace app\http\middleware;

class Authorize
{
    public function handle($request, \Closure $next)
    {
        if(session("?userinfo"))
        {
            bind("auth",session("userinfo"));
            return $next($request);
        }
        return redirect("/login");
    }
}
