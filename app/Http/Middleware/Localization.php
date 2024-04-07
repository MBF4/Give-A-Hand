<?php

// Localization.php

namespace App\Http\Middleware;

use Closure;
use App;

class Localization
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
        if(!session()->has('mode')){
          session(['mode'=>'light']);
        }
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
            if(session()->get('locale') == "ar"){
              session(['locale'=>'ar', 'dir'=>'rtl', 'opposite'=>'left', 'align'=>'right']);
            }else{
              session(['locale'=>'en', 'dir'=>'ltr', 'opposite'=>'right', 'align'=>'left']);
            }
        }else{
            App::setLocale('ar');
            session(['locale'=>'ar', 'dir'=>'rtl', 'opposite'=>'left', 'align'=>'right']);
        }
        return $next($request);
    }
}