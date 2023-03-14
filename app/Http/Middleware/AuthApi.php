<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CommonHelper;
class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
//        CommonHelper::companyMasterDatabaseConnection();
//        echo $request->emr_no;
//        die;
//        $api_token = $request->header('api_token');
//        if($api_token != $request->server('HTTP_API_TOKEN')) {
//            return response()->json(['message' => 'Api Key not found'], 401);
//        }
//        return $next($request);
    }
}
