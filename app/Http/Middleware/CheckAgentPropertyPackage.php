<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAgentPropertyPackage
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
        $user = auth()->user();
        $getPackageName = \DB::table('razorpay_payment')->where('user_id',$user->id)->first();
       if(isset($getPackageName) && !empty($getPackageName)){
        $packagesName = $getPackageName->package;
            $checkPackage = \DB::table('packages')->where('title',$packagesName)->first();
            if(isset($checkPackage)){
                $number_of_properties = $checkPackage->number_of_properties ?? "";

                $getProject = \App\Models\Property::where('created_by',$user->id)->count();

                if($number_of_properties == 0 || $number_of_properties == "0"){
                    return redirect()->route('front-end.packages'); 
                }else{
                    if($number_of_properties > $getProject){
                        return $next($request);
                    }else{
                        return redirect()->route('front-end.packages'); 
                    }
                }
            }else{
                return redirect()->route('front-end.packages');
            }
        }else{
            return redirect()->route('front-end.packages');
        }
    }
}
