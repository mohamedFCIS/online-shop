<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Category;
class checkCategory
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
        $count=Category::all()->count();
        if($count==0){
            session()->flash('error','You need to add at least one Category first.');
            return redirect('/admin/category');
        }
        return $next($request);
    }
}
