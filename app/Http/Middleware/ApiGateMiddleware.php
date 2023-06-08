<?php

namespace App\Http\Middleware;

use App\Helpers\ResponsesHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ApiGateMiddleware
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

        $request->headers->add([
            "is_api_call" => "yes"
        ]);

        if($request->header('Accept') != 'application/json')
        {
            return ResponsesHelper::returnError(
                '400',
                'Accept in header must be application/json'
            );
        }

        //checkUserIsBlocked
        $userObj = Auth::user();
        if(is_object($userObj) && $userObj->is_blocked){
            return ResponsesHelper::returnError(
                Response::HTTP_FORBIDDEN,
                'you are blocked, contact the admin'
            );
        }


        return $next($request);
    }
}
