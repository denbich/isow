<?php

namespace App\Http\Controllers\coordinator;

use App\Models\User;
use App\Rules\Pesel;
use App\Mail\ResetPoints;
use App\Models\Form_sign;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Exports\VolunteerExport;
use App\Mail\VolunteerActivation;
use App\Mail\VolunteerDeactivation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\Volunteer_history_point;

class CVolunteersController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::with('user')->paginate(20);
        return view('coordinator.volunteers.index', ['volunteers' => $volunteers]);
    }

    public function show($id)
    {
        $volunteer = Volunteer::where('ivid', $id)->with('user')->firstOrFail();
        $signed = Form_sign::where('volunteer_id', $volunteer->user_id)->with('form', 'position')->get();
        return view('coordinator.volunteers.show', ['volunteer' => $volunteer, 'signed' => $signed]);
    }

    public function edit($id)
    {
        $volunteer = Volunteer::where('ivid', $id)->with('user')->firstOrFail();
        return view('coordinator.volunteers.edit', ['volunteer' => $volunteer]);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('ivid', $id)->firstOrFail();
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'telephone' => 'required|numeric',
            'phone' => 'required|max:255',
            'street' =>'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'pesel' => ['required', 'digits:11', 'numeric', new Pesel($request->gender)],
            'description' => 'nullable','max:255',
            'tshirt_size' => 'required|string|max:255',
            'birth' => 'required|date',
            'gender' => 'required|string|size:1',
        ]);
        $volunteer = Volunteer::where('user_id', $user->id)->firstOrFail();
        $user->update([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'telephone' => $validated['phone'],
            'gender' => $validated['gender'],
        ]);
        $volunteer->update([
            'street' => $validated['street'],
            'house_number' => $validated['house_number'],
            'city' => $validated['city'],
            'pesel' => Crypt::encrypt($validated['pesel']),
            'description' => $validated['description'],
            'tshirt_size' => $validated['tshirt_size'],
            'birth' => $validated['birth'],
        ]);
        return back()->with(['update_volunteer' => true]);
    }

    public function block(Request $request)
    {
        $request->validate(['ivid' => 'required|uuid']);
        User::where('ivid', $request->ivid)->firstOrFail()->update(['condition' => 2]);
        return back()->with(['block_volunteer' => true]);
    }

    public function unblock(Request $request)
    {
        $request->validate(['ivid' => 'required|uuid', 'condition' => 'required']);
        $volunteer = User::where('ivid', $request->ivid)->firstOrFail();
        if($request->condition == 1)
        {
            $volunteer->update(['condition' => 1]);
        } else {
            $volunteer->update(['condition' => 0]);
        }

        return back()->with(['unblock_volunteer' => true]);
    }

    public function search()
    {
        if (isset($_GET['q']))
        {
            $q = $_GET['q'];
            $volunteers = Volunteer::with('user')->whereHas('user', function ($query) use ($q){
                $query->where('name', 'like', '%'.$q.'%')->orwhere('firstname', 'like', '%'.$q.'%')->orwhere('lastname', 'like', '%'.$q.'%')->orwhere('email', 'like', '%'.$q.'%')->orWhere('telephone', 'like', '%'.$q.'%');})->orWhere('pesel', Crypt::encrypt($q))->get();
                return view('coordinator.volunteers.search', ['volunteers' => $volunteers]);
        } else {
            return view('coordinator.volunteers.search');
        }
    }

    public function reset_points(Request $request)
    {
        $volunteers = Volunteer::with('user')->get();
        foreach($volunteers as $volunteer)
        {
            $points = $volunteer->points;
            $volunteer->points = 0;
            $volunteer->save();

            Volunteer_history_point::create([
                'volunteer_id' => $volunteer->user->id,
                'reason' => 1,
                'points' => 0 - $points,
                'coordinator_id' => Auth::id(),
            ]);

            $datam = array('points' => $points);
            Mail::to($volunteer->user->email)->send(new ResetPoints($datam));
        }

        return back()->with(['reset_points' => true]);
    }

    public function points(Request $request, $id)
    {
        $validated = $request->validate(['points' => 'required|numeric|min:0']);
        $volunteer = Volunteer::where('ivid', $id)->with('user')->firstOrFail();

        if($volunteer->points < $validated['points'])
        {
            $reason = 2;
            $points = $validated['points'] - $volunteer->points;
        } else {
            $reason = 3;
            $points = $volunteer->points - $validated['points'];
        }

        Volunteer_history_point::create([
            'volunteer_id' => $volunteer->user->id,
            'reason' => $reason,
            'points' => $points,
            'coordinator_id' => Auth::id(),
        ]);

        $volunteer->update(['points' => $validated['points']]);
        return back()->with(['updated_points' => true]);
    }

    public function export(Request $request, Excel $excel)
    {
        $validated = $request->validate(['filetype' => 'required|string|max:255']);
        if($request->q == null)
        {
            switch ($validated['filetype'])
            {
                case 'pdf':
                    $volunteers = Volunteer::with('user')->get();
                    $pdf = new TCPDF();
                    $pdf::SetTitle('Lista wolontariuszy');
                    $pdf::AddPage("L");
                    $lg['a_meta_charset'] = 'UTF-8';
                    $pdf::setLanguageArray($lg);
                    $pdf::SetFont('latolatin','b',15);

                    $pdf::Cell(0, 15, 'Lista wolontariuszy - WMR na dzień '.date('d.m.Y'), 0, '1', 'C', 0, '', 0, false, 'M', 'M');

                    $pdf::SetFont('latolatin','b',10);

                    $pdf::cell('15','10','ID','1','0','C');
                    $pdf::cell('40','10','Login','1','0','C');
                    $pdf::cell('80','10','Imię i nazwisko','1','0','C');
                    $pdf::cell('40','10','Nr telefonu','1','0','C');
                    $pdf::cell('70','10','email','1','0','C');
                    $pdf::cell('30','10','Koszulka','1','1','C');

                    $pdf::SetFont('latolatin','',10);

                    foreach ($volunteers as $volunteer)
                    {
                        $pdf::cell('15','10', $volunteer->id,'1','0','C');
                        $pdf::cell('40','10', $volunteer->user->name,'1','0','C');
                        $pdf::cell('80','10', $volunteer->user->firstname." ".$volunteer->user->lastname,'1','0','C');
                        $pdf::cell('40','10' ,$volunteer->user->telephone,'1','0','C');
                        $pdf::cell('70','10', $volunteer->user->email,'1','0','C');
                        $pdf::cell('30','10', strtoupper($volunteer->tshirt_size),'1','1','C');
                    }

                    $pdf::Output('lista_wolontariuszy.pdf');
                break;

                case 'excel':
                    return $excel->download(new VolunteerExport(null), 'wolontariusze_'.date('d.m.Y H.i').'.xlsx');
                break;

                case 'html':
                    return $excel->download(new VolunteerExport(null), 'wolontariusze_'.date('d.m.Y H.i').'.html');
                break;
            }
        } else {
            switch ($validated['filetype'])
            {
                case 'pdf':
                    $q = $request->q;
                    $volunteers = Volunteer::with('user')->whereHas('user', function ($query) use ($q){
                        $query->where('name', 'like', '%'.$q.'%')->orwhere('firstname', 'like', '%'.$q.'%')->orwhere('lastname', 'like', '%'.$q.'%')->orwhere('email', 'like', '%'.$q.'%')->orWhere('telephone', 'like', '%'.$q.'%');})->get();
                    $pdf = new TCPDF();
                    $pdf::SetTitle('Lista wolontariuszy');
                    $pdf::AddPage("L");
                    $lg['a_meta_charset'] = 'UTF-8';
                    $pdf::setLanguageArray($lg);
                    $pdf::SetFont('latolatin','b',15);

                    $pdf::Cell(0, 15, 'Lista wolontariuszy - WMR na dzień '.date('d.m.Y'), 0, '1', 'C', 0, '', 0, false, 'M', 'M');

                    $pdf::SetFont('latolatin','b',10);

                    $pdf::cell('15','10','ID','1','0','C');
                    $pdf::cell('40','10','Login','1','0','C');
                    $pdf::cell('80','10','Imię i nazwisko','1','0','C');
                    $pdf::cell('40','10','Nr telefonu','1','0','C');
                    $pdf::cell('70','10','email','1','0','C');
                    $pdf::cell('30','10','Koszulka','1','1','C');

                    $pdf::SetFont('latolatin','',10);

                    foreach ($volunteers as $volunteer)
                    {
                        $pdf::cell('15','10', $volunteer->id,'1','0','C');
                        $pdf::cell('40','10', $volunteer->user->name,'1','0','C');
                        $pdf::cell('80','10', $volunteer->user->firstname." ".$volunteer->user->lastname,'1','0','C');
                        $pdf::cell('40','10' ,$volunteer->user->telephone,'1','0','C');
                        $pdf::cell('70','10', $volunteer->user->email,'1','0','C');
                        $pdf::cell('30','10', strtoupper($volunteer->tshirt_size),'1','1','C');
                    }

                    $pdf::Output('lista_wolontariuszy.pdf');
                break;

                case 'excel':
                    return $excel->download(new VolunteerExport($request->q), 'wolontariusze_'.date('d.m.Y H.i').'.xlsx');
                break;

                case 'html':
                    return $excel->download(new VolunteerExport($request->q), 'wolontariusze_'.date('d.m.Y H.i').'.html');
                break;
            }
        }
    }

    public function active()
    {
        $volunteers = User::where('condition', '0')->where('role', 'volunteer')->with('volunteer')->get();
        //$volunteers = Volunteer::with('user')->whereHas('user', function ($query){$query->where('condition', '0');})->get();
        return view('coordinator.volunteers.active', ['volunteers' => $volunteers]);
    }

    public function activation(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'date' => 'required|after:'.date('Y-m-d'),
        ]);
        $user = User::where('ivid', $validated['id'])->firstOrFail();
        $datam = array('name' => $user->name);
        $user->update(['condition' => '1', 'agreement_date' => $validated['date']]);

        Mail::to($user->email)->send(new VolunteerActivation($datam));
        return back()->with(['active_volunteer' => true]);
    }

    public function dactivation(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|uuid',
            'reason' => 'required|numeric|max:6',
        ]);
        $user = User::where('ivid', $validated['id'])->firstOrFail();
        $user->update([
            'agreement_date' => date('Y-m-d', strtotime(date('Y-m-d')." - 1 day")),
            'condition' => 1,
        ]);

        switch ($validated['reason']) {
            case 1: $text = "Brak przedziału od kiedy można wykonywać wolontariat."; break;
            case 2: $text = "Podany przedział wykonywania wolontariatu jest nieprawidłowy."; break;
            case 3: $text = "Wysłany plik to nie jest wypełniona zgoda."; break;
            case 4: $text = "Zgoda jest niewyraźna."; break;
            case 5: $text = "Brak podpisu rodzica/opiekuna prawnego."; break;
            case 6: $text = "Źle wypełniona zgoda."; break;
        }

        $datam = array(
            'name' => $user->name,
            'reason' => $text,
    );
        Mail::to($user->email)->send(new VolunteerDeactivation($datam));
        return back()->with(['deactive_volunteer' => true]);
    }

    public function other()
    {
        return view('coordinator.volunteers.other');
    }

    public function agreement($ivid)
    {
        $agreement = User::where('ivid', $ivid)->firstOrFail();
        if($agreement != null) return response()->file(substr($agreement->agreement_src, 1)); else return back();
    }
}
