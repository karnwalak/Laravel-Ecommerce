<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Adminmiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->role_as == '1'){
            return redirect('/home')->with('error','Access Denied. You are not the admin!');
        }
        return $next($request);
    }
}
