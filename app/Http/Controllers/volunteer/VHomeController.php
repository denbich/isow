<?php

namespace App\Http\Controllers\volunteer;

use App\Models\Form;
use App\Models\Post;
use App\Models\User;
use App\Models\Prize;
use App\Models\Form_sign;
use App\Models\Prize_order;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Models\Calendar_event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VHomeController extends Controller
{
    public function dashboard()
    {
        $forms = Form::whereHas('calendar', function($query){
            $query->where([['end', '<', date('Y-m-d H:i:s', strtotime(" + 14 days"))],['end', '>', date('Y-m-d H:i:s')]]);
        })->with(['form_translate', 'form_positions', 'signedform', 'calendar'])->orderBy('id', 'desc')->limit(5)->get();
        $volunteer = Volunteer::where('user_id', Auth::id())->firstOrFail();
        $count = ['forms' => Form::all()->count(), 'prizes' => Prize::all()->count()];
        $posts = Post::where('form_id', 0)->orwhereHas('sign', function($query){
            $query->where('volunteer_id', Auth::id());
        })->with(['post_translate', 'author'])->limit(5)->get();
        $orders = Prize_order::where('volunteer_id', Auth::id())->with('prize', 'status')->orderBy('id', 'desc')->limit(3)->get();

        return view('volunteer.dashboard', ['forms' => $forms, 'volunteer' => $volunteer, 'count' => $count, 'posts' => $posts, 'orders' => $orders]);
    }

    public function profile()
    {
        $volunteer = Volunteer::where('user_id', Auth::id())->firstOrFail();
        return view('volunteer.profile', ['volunteer' => $volunteer]);
    }

    public function change_photo(Request $request)
    {
        $request->validate(['profile' => 'required']);
        $profile = $this->create_image($request->profile);

        Storage::disk('profiles')->delete(substr(Auth::user()->photo_src, 10));
        Storage::disk('profiles')->put($profile['imageName'], $profile['image']);

        User::where('id', Auth::id())->firstOrFail()->update([
            'photo_src' => '/profiles/'.$profile['imageName'],
        ]);

        return back()->with(['change_profile' => true]);
    }

    public function id()
    {
        $signed = Form_sign::where('volunteer_id', Auth::id())->pluck('form_id');
        $events = Calendar_event::where('start', '>=', date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')."- 1 day")))->whereIn('form_id', $signed)->get();
        return view('volunteer.id', ['events' => $events]);
    }

    public function search()
    {
        if (isset($_GET['q']))
        {
            $q = $_GET['q'];
            $forms = Form::with('form_translate')->whereHas('form_translate', function ($query) use ($q){ $query->where('title', 'like', '%'.$q.'%');})->get();

            //$forms_post = Signed_form::where('volunteer_id', Auth::user()->id)->pluck('form_id')->toArray();
            //array_push($forms_post, 0);
            //$posts = Post::WhereIn('form_id', $forms_post)->whereHas('post_translate', function ($query) use ($q){ $query->where('title', 'like', '%'.$q.'%');})->with(['post_translate', 'author'])->toSql(); //->orWhereIn('form_id', $forms_post)

            //$posts = Post::with('post_translate')->whereHas('post_translate', function ($query) use ($q){ $query->where('title', 'like', '%'.$q.'%');})->get();

            $prizes = Prize::with('prize_translate')->whereHas('prize_translate', function ($query) use ($q){ $query->where('title', 'like', '%'.$q.'%');})->get();

            return view('volunteer.search', ['forms' => $forms,'prizes' => $prizes]); // 'posts' => $posts,
        } else {
            return view('volunteer.search');
        }
    }

    public function calendar()
    {
        $events = Calendar_event::with('form')->get();
        $future_events = Calendar_event::where('start', '>=', date('d-m-Y H:i:s'))->with('form')->get();
        return view('volunteer.calendar', ['events' => $events, 'future_events' => $future_events]);
    }
}
