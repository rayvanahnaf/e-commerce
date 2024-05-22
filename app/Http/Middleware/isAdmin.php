<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::user()&&Auth::user()->role=='admin')
        // {
        //     return redirect();
        // }else{
        //     return view('pages.user.index');
        // }
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
