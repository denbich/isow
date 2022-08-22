<?php

namespace App\Http\Controllers\volunteer;

use Imagick;
use App\Models\User;
use App\Rules\Pesel;
use App\Models\Volunteer;
use App\Models\Volunteer_language;
use App\Models\System_language;
use Illuminate\Support\Str;
use App\Mail\TwoFaEmailCode;
use App\Models\User_setting;
use Illuminate\Http\Request;
use App\Models\User_email_code;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Google2FALaravel\Google2FA;
use Illuminate\Support\Facades\Validator;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class VSettingsController extends Controller
{
    public function index(Request $request)
    {
        $volunteer = Volunteer::where('user_id', Auth::id())->firstorfail();
        $settings = User_setting::where('user_id', Auth::id())->firstOrFail();
        $volunteer_languages = Volunteer_language::where('user_id', Auth::id())->firstOrFail(['language1', 'language2', 'language3', 'language4', 'language5'])->toArray();
        switch(session('locale'))
        {
            case('pl'): $language = "polish"; break;
            case('en'): $language = "english"; break;
            case('uk'): $language = "ukrainian"; break;
        }
        $languages = System_language::all(['id', 'language', $language." AS lang", 'native']);
        if($settings->google2fa == 0 && $settings->google2fa_code == null)
        {
            $google2fa = new Google2FA($request);
            $secret = $google2fa->generateSecretKey(32);
            $qrCodeUrl = $google2fa->getQRCodeUrl('IOSW','(Wolontariat MOSiR Rybnik)', $secret);
            $twofa = [
                'qr' => $qrCodeUrl,
                'secret' => $secret,
            ];
            return view('volunteer.settings', ['volunteer' => $volunteer, 'settings' => $settings, 'volunteer_languages' => $volunteer_languages, 'languages' => $languages, 'google2fa' => $twofa]);
        } else {
            return view('volunteer.settings', ['volunteer' => $volunteer, 'settings' => $settings, 'volunteer_languages' => $volunteer_languages, 'languages' => $languages,]);
        }
    }

    public function profile(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'telephone' => 'required|numeric',
            'phone' => 'required|max:255',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pesel' => ['required', 'digits:11', 'numeric', new Pesel($request->gender)],
            'description' => 'nullable','max:255',
            'tshirt_size' => 'required|string|max:255',
            'birth' => 'required|date',
            'gender' => 'required|string|size:1',
            'language' => 'required|string|size:2',
            'known_languages' => 'nullable|array|between:1,5',
        ]);

        User::where('id', Auth::id())->firstOrFail()->update([
            'email' => $validated['email'],
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'gender' => $validated['gender'],
            'telephone' => $validated['phone'],
            'language' => $validated['language'],
        ]);

        Volunteer::where('user_id', Auth::id())->firstOrFail()->update([
            'birth' => $validated['birth'],
            'tshirt_size' => $validated['tshirt_size'],
            'pesel' => encrypt($validated['pesel']),
            'street' => $validated['street'],
            'house_number' => $validated['house_number'],
            'city' => $validated['city'],
            'description' => $validated['description'],
        ]);

        Volunteer_language::where('user_id', Auth::id())->firstOrFail()->update([
            'language1' => (isset($validated['known_languages'][0])) ? $validated['known_languages'][0] : null,
            'language2' => (isset($validated['known_languages'][1])) ? $validated['known_languages'][1] : null,
            'language3' => (isset($validated['known_languages'][2])) ? $validated['known_languages'][2] : null,
            'language4' => (isset($validated['known_languages'][3])) ? $validated['known_languages'][3] : null,
            'language5' => (isset($validated['known_languages'][4])) ? $validated['known_languages'][4] : null,
        ]);

        return back()->with(['update_profile_success' => true]);
    }

    public function password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'string', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed', 'required_with:old_password', 'different:old_password'],
        ]);

        if ($validator->fails()) return redirect()->route('v.settings', '/#password')->withErrors($validator)->withInput();

        $user = User::where('id', Auth::id())->firstOrFail();
        if (Hash::check($validator['old_password'], Auth::user()->password)) {
            $user->update(['password' => Hash::make($validator['password'])]);
            return redirect()->route('v.settings', '/#password')->with(['password_changed' => true]);
        } else {
            return redirect()->route('v.settings', '/#password')->with(['password_error' => true]);
        }
    }

    public function send_email_code(Request $request)
    {
        if($request->ajax())
        {
            $code = random_int(100000, 999999);
            User_email_code::updateOrCreate(['user_id' => Auth::id()], ['code' => $code]);
            if(Mail::to(Auth::user()->email)->send(new TwoFaEmailCode(array('code' => $code)))) return true;
        }
    }

    public function email2fa(Request $request)
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
                return back()->with(['code_success' => true]);
            } else {
                return back()->withErrors(['code_wrong' => __('validation.custom.email2fa.wrong')]);
            }
        } else {
            return back()->withErrors(['code_expired' => __('validation.custom.email2fa.expired')]);
        }
    }

    public function email2fa_change(Request $request)
    {
        if($request->ajax())
        {
            $request->validate(['email2fa' => 'required']);
            switch($request->email2fa)
            {
                case("true"):
                    User_setting::where('user_id', Auth::id())->FirstOrFail()->update(['email2fa' => 1]);
                    return true;
                break;
                case("false"):
                    User_setting::where('user_id', Auth::id())->FirstOrFail()->update(['email2fa' => 0]);
                    return true;
                break;
            }
            return false;
        }
    }

    public function save_notifications(Request $request)
    {
        User_setting::where('user_id', Auth::id())->firstOrFail()->update([
            'messages_email' => ($request->notificationsettingscheck11 == "on") ? 1 : 0,
            'messages_push' => ($request->notificationsettingscheck12 == "on") ? 1 : 0,
            'notifications_email' => ($request->notificationsettingscheck21 == "on") ? 1 : 0,
            'notifications_push' => ($request->notificationsettingscheck22 == "on") ? 1 : 0,
            'marketing_email' => ($request->notificationsettingscheck31 == "on") ? 1 : 0,
            'marketing_push' => ($request->notificationsettingscheck32 == "on") ? 1 : 0,
            'login_email' => ($request->notificationsettingscheck41 == "on") ? 1 : 0,
            'login_push' => ($request->notificationsettingscheck42 == "on") ? 1 : 0,
        ]);
        return back()->with(['update_notifications' => true]);
    }

    public function new_agreement(Request $request)
    {
        $validated = $request->validate([
            'agreement.*' => 'required|file|mimes:pdf,jepg,png,jpg|max:7168',
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

            User::where('id', Auth::id())->firstOrFail()->update([
                'agreement_src' => '/agreements/'.$agreement,
                'agreement_date' => date('Y-m-d', strtotime(date('Y-m-d')." - 1 day")),
                'condition' => 0,
            ]);

            $locale = session('locale');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session(['locale' => $locale]);
            return redirect()->route('login')->with(['agreement' => true]);
        } else {
            return back()->with(['agreement_err' => true]);
        }
    }

    public function agreement()
    {
        $agreement = User::where('id', Auth::id())->firstOrFail();
        if($agreement != null) return response()->file(substr($agreement->agreement_src, 1)); else return back();
    }

    // public function google2fa(Request $request)
    // {
    //     $validated = $request->validate(['secret' => 'required|string|size:32']);
    //     $user = User_setting::where('user_id', Auth::id())->FirstOrFail();
    //     if($user->google2fa == null)
    //     {
    //         $user->update(['google2fa' => 1, 'google2fa_code' => $validated['secret']]);
    //         return back()->with(['google2fa_success' => true]);
    //     } else {
    //         return back()->with(['google2fa_error' => true]);
    //     }
    // }

    // public function google2fa_change(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $request->validate(['google2fa' => 'required']);
    //         switch($request->google2fa)
    //         {
    //             case("true"):
    //                 User_setting::where('user_id', Auth::id())->FirstOrFail()->update(['google2fa' => 1]);
    //                 return true;
    //             break;
    //             case("false"):
    //                 User_setting::where('user_id', Auth::id())->FirstOrFail()->update(['google2fa' => 0]);
    //                 return true;
    //             break;
    //         }
    //         return false;
    //     }
    // }
}
