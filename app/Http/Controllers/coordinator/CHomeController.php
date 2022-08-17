<?php

namespace App\Http\Controllers\coordinator;

use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use App\Models\Prize;
use App\Models\Sent_mail;
use App\Models\Volunteer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Calendar_event;
use App\Mail\CoordinatorMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class CHomeController extends Controller
{
    public function dashboard()
    {
        $volunteers = Volunteer::with('user')->get();
        $count = [
            'volunteers' => $volunteers->count(),
            'volunteers_p' => '3,5%',
            'volunteers_active' => User::where([['role', 'volunteer'], ['condition', 0]])->count(),
            'prizes' => Prize::all()->count(),
            'prizes_p' => '0%',
        ];

        $forms = Form::with(['form_translate', 'form_positions', 'signedform', 'calendar'])->whereHas('calendar', function ($query) {
            return $query->where('end', '>=', date( 'Y-m-d H:i:s', strtotime(date( 'Y-m-d H:i:s') .' -7 day'))); })->orderBy('id', 'desc')->limit(5)->get();
            $months = [
                '1' => 'Styczeń',
                '2' => 'Luty',
                '3' => 'Marzec',
                '4' => 'Kwiecień',
                '5' => 'Maj',
                '6' => 'Czerwiec',
                '7' => 'Lipiec',
                '8' => 'Sierpień',
                '9' => 'Wrzesień',
                '10' => 'Październik',
                '11' => 'Listopad',
                '12' => 'Grudzień',
            ];

        $stats = [
            'first' => [
                'month' => $months[Carbon::now()->startOfMonth()->month],
                'data' => User::where('role', 'volunteer')->whereBetween('created_at', [Carbon::now()->startOfMonth()->toDateTimeString(), Carbon::now()->endOfMonth()->toDateTimeString()])->count(),
            ],
            'second' => [
                'month' => $months[Carbon::now()->subMonth()->startOfMonth()->month],
                'data' => User::where('role', 'volunteer')->whereBetween('created_at', [Carbon::now()->subMonth(1)->startOfMonth()->toDateTimeString(), Carbon::now()->subMonth(1)->endOfMonth()->toDateTimeString()])->count(),
            ],
            'third' => [
                'month' => $months[Carbon::now()->subMonths(2)->startOfMonth()->month],
                'data' => User::where('role', 'volunteer')->whereBetween('created_at', [Carbon::now()->subMonths(2)->startOfMonth()->toDateTimeString(), Carbon::now()->subMonths(2)->endOfMonth()->toDateTimeString()])->count(),
            ],
            'fourth' => [
                'month' => $months[Carbon::now()->subMonths(3)->startOfMonth()->month],
                'data' => User::where('role', 'volunteer')->whereBetween('created_at', [Carbon::now()->subMonths(3)->startOfMonth()->toDateTimeString(), Carbon::now()->subMonths(3)->endOfMonth()->toDateTimeString()])->count(),
            ],
            'fifth' => [
                'month' => $months[Carbon::now()->subMonths(4)->startOfMonth()->month],
                'data' => User::where('role', 'volunteer')->whereBetween('created_at', [Carbon::now()->subMonths(4)->startOfMonth()->toDateTimeString(), Carbon::now()->subMonths(4)->endOfMonth()->toDateTimeString()])->count(),
            ],
            'sixth' => [
                'month' => $months[Carbon::now()->subMonths(5)->startOfMonth()->month],
                'data' => User::where('role', 'volunteer')->whereBetween('created_at', [Carbon::now()->subMonths(5)->startOfMonth()->toDateTimeString(), Carbon::now()->subMonths(5)->endOfMonth()->toDateTimeString()])->count(),
            ],
        ];

        return view('coordinator.dashboard', ['count' => $count, 'forms' => $forms, 'volunteers' => $volunteers, 'stats' => $stats]);
    }

    public function calendar()
    {
        $events = Calendar_event::with('form')->get();
        $future_events = Calendar_event::where('start', '<=', date('d-m-Y H:i:s'))->with('form')->get();
        return view('coordinator.apps.calendar', ['events' => $events, 'future_events' => $future_events]);
    }

    public function search()
    {
        if(isset($_GET['q']))
        {
            $q = $_GET['q'];
            $prizes = Prize::whereHas('prize_translate', function (Builder $query) use($q) {
                $query->where('name', 'like', '%'.$q.'%');
            })->with('prize_translate')->get();
            $forms = 1;
            $sponsors = 1;
            return view('coordinator.search', ['prizes' => $prizes, 'forms' => $forms, 'sponsors' => $sponsors]);
        } else {
            return view('coordinator.search');
        }
    }

    public function change_photo(Request $request)
    {
        $validated = $request->validate(['profile' => 'required']);
        $photo = $this->create_image($request->profile);

        Storage::disk('profiles')->delete(substr(Auth::user()->photo_src, 10));
        Storage::disk('profiles')->put($photo['imageName'], $photo['image']);

        $user = User::where('id', Auth::id())->firstOrFail();
        $user->photo_src = '/profiles/'.$photo['imageName'];
        $user->save();

        return back()->with(['change_profile' => true]);
    }

    public function profile()
    {
        $forms = Form::where('author_id', Auth::id())->with('form_translate')->get();
        return view('coordinator.profile', ['forms' => $forms]);
    }

    public function update_volunteer(Request $request)
    {
        $user = User::where('name', 'wolontariusz'.$request->id)->firstOrFail();

        $imageName = Str::random(100).time().'.png';
        $profile = Storage::disk('profiles')->putFileAs('', $request->file('profile'), $imageName);

        if ($request->agreement != null)
        {
            $agreementName = Str::random(100).time();
            $agreement = Storage::disk('agreements')->put($agreementName, $request->agreement);
            $user->agreement_src = '/agreements/'.$agreement;
        }

        $user->photo_src = '/profiles/'.$imageName;
        $user->save();

        return back()->with(['v' => true]);
    }

    public function sendmail()
    {
        $volunteers = User::where('role', 'volunteer')->get();
        return view('coordinator.apps.sendmail', ['volunteers' => $volunteers]);
    }

    public function send_mail(Request $request)
    {
        abort(500);
        $validate = $request->validate([
            'recivier' => 'required',
            'receiver-select' => 'nullable|required_if:recivier,choose',
            'email' => 'email|nullable|required_if:recivier,custom',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $datam = array(
            'title' => $request->title,
            'content' => str_replace('"', "'", str_replace("\r\n", '', $request->content)),
        );

        if($request->recivier_radio == 'choose')
        {
            Mail::bcc(User::where([['role', 'volunteer'], ['ivid', $request->recivier_select]])->pluck('email'))->send(new CoordinatorMessage($datam));
        } else {
            Mail::bcc(User::where('role', 'volunteer')->pluck('email'))->send(new CoordinatorMessage($datam));
        }

        Sent_mail::create([
            'sender_id' => Auth::user()->id,
            'title' => $request->title,
            'content' => str_replace('"', "'", str_replace("\r\n", '', $request->content))
        ]);

        return back()->with('sent_mail', true);
    }
}
