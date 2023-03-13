<?php

namespace App\Http\Middleware;


use Closure;
use Exception;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenBlacklistedException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use PHPOpenSourceSaver\JWTAuth\Http\Middleware\BaseMiddleware;

// use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
// use \Tymon\JWTAuth\Exceptions\TokenInvalidException;
// use \Tymon\JWTAuth\Exceptions\TokenExpiredException;
// use \Tymon\JWTAuth\Exceptions\TokenBlacklistedException;


class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = FacadesJWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status' => 'Token is Invalid'], 403);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['status' => 'Token is Expired'], 401);
            } else if ($e instanceof TokenBlacklistedException) {
                return response()->json(['status' => 'Token is Blacklisted'], 400);
            } else {
                return response()->json(['status' => 'Authorization Token not found'], 404);
            }
        }
        return $next($request);
    }
}
