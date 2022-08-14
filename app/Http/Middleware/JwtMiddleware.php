<?php

namespace App\Http\Middleware;

use App\Http\Helpers\AppResponseTrait;
use App\Interfaces\Helpers\Guards\GuardInterface;
use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\Guard;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
{
    use AppResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $status =null;
        $message=null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                $message= 'Token is Invalid';
                $status = Response::HTTP_UNPROCESSABLE_ENTITY;
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                $message = 'Token is Expired';
                $status = Response::HTTP_FORBIDDEN;
            }else{
                $message = 'Authorization Token not found';
                $status = Response::HTTP_UNAUTHORIZED;
            }
            return $this->sendErrorPopup([$message],$status);
        }
        return $next($request);
    }

}
