<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'volunteer')
        {
            if (Auth::user()->agreement_date > date('Y-m-d'))
            {
                if(User_setting::where('user_id', Auth::id())->firstOrfail()->email2fa == 0 || session('email2fa') == true)
                    return redirect()->route('loginauth');
                else
                    return redirect()->route('twofa');
            } else {
                return $next($request);
            }
        } else {
            return redirect()->route('loginauth');
        }

    }
}
