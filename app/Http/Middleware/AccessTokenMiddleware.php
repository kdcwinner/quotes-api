<?php

namespace App\Http\Middleware;

use App\Models\AccessToken;
use Closure;
use Illuminate\Http\Request;

class AccessTokenMiddleware
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
        $authorization = $request->header('Authorization');
        $accessToken = AccessToken::where('access_token',$authorization)->first();
        if(!$accessToken){
            return response()->json(['status'=>false,'message'=>'Unauthorized'],401);
        }
        return $next($request);
    }
}
