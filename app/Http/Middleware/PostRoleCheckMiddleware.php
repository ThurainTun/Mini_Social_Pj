<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostRoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id=request('id');
        $authorID=Post::find($id)->user_id;
        if (auth()->user()->isAdmin=="1"|| auth()->user()->isPremium=="1" || auth()->user()->id==$authorID) {
            return $next($request);            
        } else {
            return redirect()->route('index');
        }
        
    }
}
