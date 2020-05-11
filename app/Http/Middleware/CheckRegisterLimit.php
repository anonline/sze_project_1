<?php

namespace App\Http\Middleware;

use App\RaceDataModel;
use Closure;

class CheckRegisterLimit
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
       $register_info = RaceDataModel::where('races_id', '=', $request->race_id)->select('max_register_number', 'register_number')->first();

       if($register_info->max_register_number > $register_info->register_number){
           return $next($request);
       }
       else{
           return response()->json('The number of registration is full.', 303);
       }

    }
}
