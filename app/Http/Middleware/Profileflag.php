<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profileflag 
{

    public function handle(Request $request,Closure $next)
    {
        if(Auth::user()->profile_flag == 0)
        {
            // dd($request);
            return response( 
                view("users.gameprofile",[
                    "user" => Auth::user(),
                    // "gameprofile" => Auth::user()->gameprofile()->first(),
                ])->with("gameprofile_flag","サービスを利用するにはゲームプロフィールの登録をしてください。") 
            );
        }
        return $next($request);
    }
}
