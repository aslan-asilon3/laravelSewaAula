<?php



namespace App\Http\Middleware;



use Closure;



class IsAdmin

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

        if(auth()->check() && auth()->user()->is_admin == "admin"){

            return $next($request);

        }

        if(auth()->check() && auth()->user()->is_admin == "reservator"){

            return $next($request);

        }

        if(auth()->check() && auth()->user()->is_admin == "kepalapuskesmas"){

            return $next($request);

        }

        if(auth()->check() && auth()->user()->is_admin == "user"){

            return $next($request);

        }



        return redirect("home")->with('error',"You don't have admin access.");

    }

}
