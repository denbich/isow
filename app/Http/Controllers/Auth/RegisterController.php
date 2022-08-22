<?php

namespace App\Http\Controllers\Auth;

use Imagick;
use App\Models\User;
use App\Rules\Pesel;
use App\Models\Volunteer;
use App\Mail\NewVolunteer;
use Illuminate\Support\Str;
use App\Models\User_session;
use App\Models\User_setting;
use App\Http\Controllers\Controller;
use App\Models\Volunteer_language;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'numeric'],
            'phone' => ['required', 'max:255'],
            'street' =>['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'pesel' => ['required', 'digits:11', 'numeric', new Pesel($data['gender'])],
            'description' => ['nullable','max:255'],
            'tshirt_size' => ['required', 'string', 'max:255'],
            'birth' => ['required', 'date'],
            'gender' => ['required', 'string', 'size:1'],
            'agreement.*' => ['required', 'file', 'mimes:pdf,jepg,png,jpg', 'max:7168'],
            'profile' => ['required'],
            'terms' => ['required'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $names = [];
        $pdf = PDFMerger::init();
        foreach($data['agreement'] as $key => $value)
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
        $image = $this->create_image($data['profile']);
        Storage::disk('profiles')->put($image['imageName'], $image['image']);

        $agreementName = base64_encode(Str::uuid()).Str::random(20).time().".pdf";
        $pdf->merge();
        $pdf->save(storage_path('app/temp/'.$agreementName));
        $agreement = Storage::disk('agreements')->putFile($agreementName, storage_path('app/temp/'.$agreementName));
        Storage::disk('temp')->delete($agreementName);
        foreach($names as $name)
        {
            Storage::disk('temp')->delete($name);
        }

        if(isset($data['marketing']) == true) if ($data['marketing'] == "on") $mark = 1; else $mark = 0; else $mark = 0;

        $user = User::create([
            'ivid' => Str::uuid(),
            'name' => $data['email'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'volunteer',
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'telephone' => $data['phone'],
            'photo_src' => '/profiles/'.$image['imageName'],
            'agreement_src' => '/agreements/'.$agreement,
            'language' => session('locale'),
            'condition' => 0,
        ]);

        User_setting::create([
            'user_id' => $user->id,
            'google_auth' => 0,
            'google_auth_id' => null,
            'google_auth_email' => null,
            'facebook_auth' => 0,
            'facebook_auth_id' => null,
            'facebook_auth_email' => null,
            'google2fa' => 0,
            'google2fa_code' => null,
            'email2fa' => 0,
            'messages_email' => 1,
            'messages_push' => 1,
            'notifications_email' => 1,
            'notifications_push' => 1,
            'marketing_email' => $mark,
            'marketing_push' => $mark,
            'login_email' => 1,
            'login_push' => 1,
        ]);

        //$user_session = User_session::create([]);

        Volunteer_language::create(['user_id' => $user->id]);

        $volunteer = Volunteer::create([
            'ivid' => Str::uuid(),
            'user_id' => $user->id,
            'points' => 0,
            'birth' => $data['birth'],
            'tshirt_size' => $data['tshirt_size'],
            'pesel' => encrypt($data['pesel']),
            'street' => $data['street'],
            'house_number' => $data['house_number'],
            'city' => $data['city'],
            'description' => $data['description'],
        ]);

        $username = "wolontariusz".$volunteer->id;
        $user->update(['name' => $username]);
        $datam = array('name' => $username);
        Mail::to(User::where('role', 'coordinator')->get()->pluck('email'))->send(new NewVolunteer($datam));

        return $user;
    }
}
