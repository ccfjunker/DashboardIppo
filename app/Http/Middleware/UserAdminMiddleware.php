<?php

namespace App\Http\Middleware;

use App\Util\Parametro;
use Closure;
class UserAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->funcao == Parametro::FUNCAO_ADMIN){
            return $next($request);
        }

        return redirect('home')->with('error',"You don't have admin access.");
    }
}
