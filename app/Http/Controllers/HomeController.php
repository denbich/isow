<?php

namespace App\Http\Controllers;

use Imagick;
use App\Models\User;
use App\Models\Form_sign;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Mail\TwoFaEmailCode;
use App\Models\User_session;
use App\Models\User_setting;
use App\Models\User_email_code;
use Illuminate\Http\Request;
use App\Models\Calendar_event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class HomeController extends Controller
{
    public function loginauth(Request $request)
    {
        if(User_setting::where('user_id', Auth::id())->firstOrfail()->email2fa == 0 || session('email2fa') == true)
        {
            // $agent = new Agent();
            // if($agent->isDesktop()) $is = 1; else $is = 0;
            // $session = User_session::where('ip_address', $request->ip())->where('system', $agent->platform())->where('device', $agent->device())->where('web_browser', $agent->browser())->where('is_blocked', $is)->get();
            // if(count($session) == 0)
            // {
            //     User_session::create([
            //         'user_id' => Auth::id(),
            //         'ip_address' => $request->ip(),
            //         'system' => $agent->platform(),
            //         'device' => $agent->device(),
            //         'web_browser' => $agent->browser(),
            //         'is_blocked' => $is,
            //     ]);
            // } else {
            //     $session->first()->update(['ip' => $request->ip()]);
            // }

            switch (Auth::user()->role) {
                case "volunteer":
                    return redirect()->route('v.dashboard');
                break;
                case "coordinator":
                    return redirect()->route('c.dashboard');
                break;
                case "admin":
                    return redirect()->route('a.dashboard');
                break;
            }
        } else {
            return redirect()->route('twofa');
        }
    }

    public function twofa()
    {
        $user = User_email_code::where('user_id', Auth::id())->firstOrFail();
        if($user->updated_at < date('Y-m-d H:i:s', strtotime('-1 minute')))
        {
            $code = random_int(100000, 999999);
            $user->update(['code' => $code]);
            Mail::to(Auth::user()->email)->send(new TwoFaEmailCode(array('code' => $code)));
        }

        return view('auth.twofa');
    }

    public function twofa_send(Request $request)
    {
        if($request->ajax())
        {
            $code = random_int(100000, 999999);
            User_email_code::updateOrCreate(['user_id' => Auth::id()], ['code' => $code]);
            if(Mail::to(Auth::user()->email)->send(new TwoFaEmailCode(array('code' => $code)))) return true;
        }
    }

    public function twofa_validate(Request $request)
    {
        $validated = $request->validate([
            'digit1' => 'required|numeric|max:9',
            'digit2' => 'required|numeric|max:9',
            'digit3' => 'required|numeric|max:9',
            'digit4' => 'required|numeric|max:9',
            'digit5' => 'required|numeric|max:9',
            'digit6' => 'required|numeric|max:9',
        ]);

        $user = User_email_code::where('user_id', Auth::id())->firstOrFail();

        if($user->updated_at > date('Y-m-d H:i:s', strtotime('-20 minutes')))
        {
            if(intval(join($validated)) == $user->code)
            {
                User_setting::where('user_id', Auth::id())->firstOrFail()->update(['email2fa' => 1]);
                session(['email2fa' => true]);
                return redirect()->route('loginauth');
            } else {
                return back()->with(['code_wrong' => true]);
            }
        } else {
            return back()->with(['code_expired' => true]);
        }
    }

    public function update_agreement(Request $request)
    {
        $validated = $request->validate([
            'agreement.*' => ['required', 'file', 'mimes:pdf,jepg,png,jpg', 'max:7168'],
        ]);

        $remove = Storage::disk('agreements')->DeleteDirectory(substr(Auth::user()->agreement_src, 12, -45));
        if ($remove == true)
        {
            $names = [];
            $pdf = PDFMerger::init();
            foreach($validated['agreement'] as $key => $value)
            {
                if($value->getmimetype() == 'image/png' || $value->getmimetype() == 'image/jpeg')
                {
                    $im = new Imagick(realpath($value));
                    $im->setImageFormat('pdf');
                    $filename = Str::uuid().time().'.pdf';
                    $im->writeImage(storage_path('app/temp/'.$filename));
                    $file = [$filename];

                    $names = array_merge($names, $file);
                    $pdf->addPDF(storage_path('app/temp/'.$filename), 'all');
                } else if($value->getmimetype() == 'application/pdf') $pdf->addPDF($value, 'all');
            }

            $agreementName = base64_encode(Str::uuid()).Str::random(20).time().".pdf";
            $pdf->merge();
            $pdf->save(storage_path('app/temp/'.$agreementName));
            $agreement = Storage::disk('agreements')->putFile($agreementName, storage_path('app/temp/'.$agreementName));
            Storage::disk('temp')->delete($agreementName);
            foreach($names as $name)
            {
                Storage::disk('temp')->delete($name);
            }

            $locale = session('locale');
            User::where('id', Auth::id())->firstOrFail()->update([
                'agreement_src' => '/agreements/'.$agreement,
                'agreement_date' => date('Y-m-d', strtotime(date('Y-m-d')." - 1 day")),
                'condition' => 0,
            ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session(['locale' => $locale]);
            return redirect()->route('login')->with(['agreement' => true]);
        } else {
            return redirect()->route('new.agreement')->with(['agreement_err' => true]);
        }
    }

    public function volunteer($ivid)
    {
        $volunteer = User::where('ivid', $ivid)->first();

        $signed = Form_sign::where('volunteer_id', $volunteer->id)->pluck('form_id');
        $events = Calendar_event::where('start', '>=', date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')."- 1 day")))->whereIn('form_id', $signed)->get();

        return view('home.id')->with(['volunteer' => $volunteer, 'events' => $events]);
    }

    public function googleredirect()
    {
        echo "Redirect to Google...";
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            if(Auth::check())
            {
                $UserSettings = User_setting::where('user_id', Auth::id())->firstOrFail();
                if($UserSettings->facebook_auth == 0)
                {
                    $UserSettings->update([
                    'google_auth' => 1,
                    'google_auth_id' => $user->id,
                    'google_auth_email' => $user->email,
                ]);
                return redirect()->route('v.settings')->with(['connect_google' => true]);
                } else {
                    return redirect()->route('v.settings')->with(['connect_google_error' => true]);
                }
            } else {
                $existingUser = User_setting::where('google_auth_email', $user->email)->where('google_auth_id', $user->id)->firstOrFail();
                if($existingUser != null)
                {
                    Auth::login(User::where('id', $existingUser->user_id)->firstOrFail());
                    return redirect()->route('loginauth');
                } else {
                    return redirect()->route('login')->withErrors(['google' => __('validation.custom.oauth.notfound')]);
                }
            }
        } catch (\Exception $e) {
            if(Auth::check())
                return redirect()->route('v.settings')->withErrors(['google' => __('validation.custom.oauth.error')]);
            else
                return redirect()->route('login')->withErrors(['google' => __('validation.custom.oauth.error')]);
        }
    }

    public function googledisconect()
    {
        User_setting::where('user_id', Auth::id())->firstOrFail()->update([
            'google_auth' => 0,
            'google_auth_id' => null,
            'google_auth_email' => null,
        ]);
        return back()->with(['disconnect_google' => true]);
    }

    public function facebookredirect()
    {
        echo "Redirect to facebook...";
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookcallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            if(Auth::check())
            {
                $UserSettings = User_setting::where('user_id', Auth::id())->firstOrFail();
                if($UserSettings->google_auth == 0)
                {
                    $UserSettings->update([
                        'facebook_auth' => 1,
                        'facebook_auth_id' => $user->id,
                        'facebook_auth_email' => $user->email,
                    ]);
                    return redirect()->route('v.settings')->with(['connect_facebook' => true]);
                } else {
                    return redirect()->route('v.settings')->with(['connect_facebook_error' => true]);
                }

            } else {
                $existingUser = User_setting::where('facebook_auth_email', $user->email)->where('facebook_auth_id', $user->id)->firstOrFail();
                if($existingUser != null)
                {
                    Auth::login(User::where('id', $existingUser->user_id)->firstOrFail());
                    return redirect()->route('loginauth');
                } else {
                    return redirect()->route('login')->withErrors(['facebook' => __('validation.custom.oauth.notfound')]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['facebook' => __('validation.custom.oauth.error')]);
        }
    }

    public function facebookdisconect()
    {
        User_setting::where('user_id', Auth::id())->firstOrFail()->update([
            'facebook_auth' => 0,
            'facebook_auth_id' => null,
            'facebook_auth_email' => null,
        ]);
        return back()->with(['disconnect_facebook' => true]);
    }
}
