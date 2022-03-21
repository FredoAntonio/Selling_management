<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class Admin 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     
    public function handle(Request $request, Closure $next)
    {
        
        $user_admin = User::where('type', 1)->where('id', auth()->id())->first();
        if ($user_admin) {
            return $next($request);
        } else {

        return redirect()->back();
        }
    }
}
