<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'Token expirado.'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'Token inválido.'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token ausente.'], 401);
        }

        return $next($request);
    }
}
