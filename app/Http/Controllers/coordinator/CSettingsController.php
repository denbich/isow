<?php

namespace App\Http\Controllers\coordinator;

use App\Models\User;
use App\Models\User_session;
use App\Models\User_setting;
use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Kazelot\Geolocation\Facades\Geolocation;

class CSettingsController extends Controller
{
    public function index(Request $request)
    {
        $settings = User_setting::where('user_id', Auth::id())->firstOrFail();
        $sessions = User_session::where('user_id', Auth::id())->limit(3)->get();
        $geolocation = Geolocation::lookup();
        if($settings->google2fa == 0 && $settings->google2fa_code == null)
        {
            $google2fa = new Google2FA($request);
            $secret = $google2fa->generateSecretKey(32);
            $qrCodeUrl = $google2fa->getQRCodeUrl('IOSW','(Wolontariat MOSiR Rybnik)', $secret);
            $twofa = [
                'qr' => $qrCodeUrl,
                'secret' => $secret,
            ];
            return view('coordinator.settings', ['settings' => $settings, 'google2fa' => $twofa, 'sessions' => $sessions, 'geolocation' => $geolocation]);
        } else {
            return view('coordinator.settings', ['settings' => $settings, 'sessions' => $sessions, 'geolocation' => $geolocation]);
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
            'gender' => 'required|string|size:1',
            'language' => 'required|string|size:2',
        ]);

        User::where('id', Auth::id())->firstOrFail()->update([
            'email' => $validated['email'],
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'gender' => $validated['gender'],
            'telephone' => $validated['phone'],
            'language' => $validated['language'],
        ]);

        return back()->with(['updated_profile' => true]);
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
            return redirect()->route('c.settings', '/#password')->with(['password_changed' => true]);
        } else {
            return redirect()->route('c.settings', '/#password')->with(['password_error' => true]);
        }
    }
}
