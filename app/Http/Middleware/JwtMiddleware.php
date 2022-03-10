<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Handler\Helper;

class JwtMiddleware extends BaseMiddleware
{

    protected $response;

    public function handle(Request $request, Closure $next)
    {
        $this->response = new Helper;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response($this->response->unauthorized("Token tidak dikenali"),401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response($this->response->unauthorized("Token kadaluarsa"),401);
            }else{
                return response($this->response->unauthorized("Token Tidak Ditemukan"),401);
            }
        }
        return $next($request);
    }
}
