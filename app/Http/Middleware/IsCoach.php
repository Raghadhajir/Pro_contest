<?php

namespace App\Http\Middleware;

use App\Http\Traits\GeneralTrait;
use Closure;
use GuzzleHttp\ClientTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class IsCoach
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_coach) {
            return $next($request);
        }

        return $this->unAuthorizeResponse();
    }

}

