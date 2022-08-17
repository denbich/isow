<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User_setting;

class VolunteerCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == 'volunteer')
        {
            $locale = session('locale');
            switch(Auth::user()->condition) {
                case 0:
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    session(['locale' => $locale]);
                    return redirect()->route('login')->with(['user_check' => true]);
                break;
                case 1:
                    if (Auth::user()->agreement_date < date('Y-m-d'))
                    {
                        return redirect()->route('new.agreement');
                    } else {
                        if(User_setting::where('user_id', Auth::id())->firstOrfail()->email2fa == 0 || session('email2fa') == true)
                            return $next($request);
                        else
                            return redirect()->route('twofa');
                    }
                break;
                case 2:
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    session(['locale' => $locale]);
                    return redirect()->route('login')->with(['block' => true]);
                break;
                }
        } else {
            return redirect()->route('loginauth');
        }
    }
}
