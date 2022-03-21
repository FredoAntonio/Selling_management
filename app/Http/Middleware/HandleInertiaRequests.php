<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    
    public function version(Request $request)
    {
        return parent::version($request);
    }
    public function share(Request $request)
    {
    
      /*if( $request->user()){
     
      }*/
     
        return array_merge(parent::share($request), [
           
           
            // Synchronously
            'appName' => config('app.name'),

            // Lazily
            'user' => fn () => $request->user()
                ? $request->user()->only('id', 'name', 'email')
                : null,
            //'csrfToken' => fn () => csrf_token(),
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
               
                   
        ]);
    }


}
