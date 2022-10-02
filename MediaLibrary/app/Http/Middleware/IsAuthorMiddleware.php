<?php

namespace App\Http\Middleware;

use App\Models\MediaItem;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class IsAuthorMiddleware
{
    /**
     * Handle an incoming request. It is only allowed to continue if the user is the author of the resource
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->id === $request->mediaitem->user_id) {
            return $next($request);
        }else return redirect('/')->with('error', "You do not have privileges to manage this MediaItem");
    }
}
