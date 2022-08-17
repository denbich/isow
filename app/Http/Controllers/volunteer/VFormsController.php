<?php

namespace App\Http\Controllers\volunteer;

use App\Models\Form;
use App\Models\Form_sign;
use App\Models\Signed_form;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Form_position;
use App\Models\Position_form;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VFormsController extends Controller
{
    public function list()
    {
        $forms = Form::whereHas('calendar', function ($query) {
            return $query->where('end', '>', date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 7 days')));
        })->with(['form_translate', 'form_category', 'calendar'])->withCount('signed_form')->get();
        return view('volunteer.forms.index', ['forms' => $forms]);
    }

    public function form($id)
    {
        $form = Form::where('ivid', $id)->with('form_translate', 'calendar')->firstOrFail();
        $positions = Form_position::where('form_id', $form->id)->with('form_position_translate')->withCount('signed_form')->get();
        $signed_volunteers = Form_sign::where('form_id', $form->id)->with(['volunteer', 'position'])->get();
        $signed_volunteer = Form_sign::where('volunteer_id', Auth::id())->where('form_id', $form->id)->with(['position'])->first();

        return view('volunteer.forms.show', ['form' => $form,'positions' => $positions, 'signed_volunteers' => $signed_volunteers, 'signed_volunteer' => $signed_volunteer]);
    }

    public function archive()
    {
        $forms = Form::whereHas('calendar', function ($query) {
            return $query->where('end', '<', date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 7 days')));
        })->with(['form_translate', 'calendar', 'signed_form'])->withCount('signed_form')->get();
        return view('volunteer.forms.archive', ['forms' => $forms]);
    }

    public function signto(Request $request, $id)
    {
        $form = Form::where('ivid', $id)->firstOrFail();
        $position = Form_position::where([['ivid', $request->position],['form_id', $form->id]])->firstOrFail();
        if ($position != null)
        {
            Form_sign::create([
                'volunteer_id' => Auth::id(),
                'ivid' => Str::uuid(),
                'form_id' => $form->id,
                'position_id' => $position->id,
                'choosen_position_id' => $position->id,
                'condition' => 0
            ]);
            return back()->with(['signed_form' => true]);
        } else {
            return back();
        }
    }

    public function unsign(Request $request, $id)
    {
        $form = Form::where('ivid', $id)->firstOrFail();
        Form_sign::where([
            ['ivid', $request->position],
            ['form_id', $form->id],
            ['volunteer_id', Auth::id()]
        ])->delete();
        return back()->with(['delete_sign' => true]);
    }

    public function certificate(Request $request)
    {
        $form = Form::where('ivid', $request->form)->with('form_translate', 'calendar')->firstOrFail();
        $signed = Form_sign::where('form_id', $form->id)->where('volunteer_id', Auth::id())->firstOrFail();

        if (session('locale') == 'pl')
        {
            $pdf = new TCPDF();
            $pdf::SetTitle('Zaświadczenie nr '.base_convert($signed->id, 10, 16));
            $pdf::AddPage("P");
            $lg['a_meta_charset'] = 'UTF-8';
            $pdf::setLanguageArray($lg);
            $pdf::SetFont('latolatin', '', 12, '', true);

            if (Auth::user()->gender == "f")
                {
                    $p = array("Odbyła", "realizowała", "jej", "Wykazała", "przyczyniła");
                } else if (Auth::user()->gender = "m")
                {
                    $p = array("Odbył", "realizował", "mu", "Wykazał", "przyczynił");
                }

                $pdf::Image(url('/img/herb.png'), '', '18', '', 17, 'PNG');
                $pdf::Image(url('/img/logowmr.png'), '', '5', '', 37, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
                $pdf::Image(url('/img/logomosir.png'), '', '18', '', 13, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);
                $html = '<p></p><p></p><p></p><p></p><p></p><p></p>
                <p style="text-align:right;">Rybnik, dnia '.date("d.m.Y", strtotime($form->calendar->end)).' r. </p>
                <p></p>
                <p style="text-align:center">Zaświadcza się, że</p>
                <p></p>
                <p style="text-align:center; font-weight:bold">'.Auth::user()->firstname.' '.Auth::user()->lastname.'</p>
                <p></p>
                <p style="text-align:center">'.$p[0].' wolontariat w dniu '.date("d.m.Y", strtotime($form->calendar->end)).' r. w trakcie organizacji</p>
                <p></p>
                <p style="text-align:center; font-weight:bold">'.$form->form_translate->title.'</p>
                <p></p>
                <p style="text-align:center;">'.Auth::user()->firstname.' '.$p[1].' powierzone '.$p[2].' powierzone zadania z należytą starannością i zaangażowaniem. '.$p[3].' się również otwartością oraz umiejętnością współpracy w zespole, czym '.$p[4].' się do sukcesu imprezy. </p>
                <p></p><p></p><p></p>
                <table style="width: 100%;">
                <tr style="font-weight:bold;"><td>Administrator systemu</td><td style="text-align:right;">Dział organizacji imprez</td></tr>
                <tr><td></td></tr>
                <tr><td>Denis Bichler</td><td style="text-align:right;">Wiktoria Wistuba</td></tr>
                </table>';
                $pdf::writeHTML($html, true, false, true, false, '');

                $text1 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p style="font-size:9px; text-align:center;">Unikalny numer zaświadczenia: '.$signed->ivid.'</p>';
                $text11 = '<p style="font-size:9px; text-align:center;">Zaświadczenie zostało wygenerowane automatycznie.</p>';
                $text2 = '<p style="font-size:9px; text-align:center;">By zweryfikować prawdziwość zaświadczenia, proszę napisać na adres: administrator@wolontariat.rybnik.pl</p>';
                $pdf::writeHTML($text1, true, false, true, false, '');
                $pdf::writeHTML($text11, true, false, true, false, '');
                $pdf::writeHTML($text2, true, false, true, false, '');

            $pdf::Output('zaswiadczenie_nr_'.base_convert($signed->id, 10, 16).'.pdf');
        } else if (session('locale') == 'en' || session('locale') == 'uk')
        {
            $pdf = new TCPDF();
            $pdf::SetTitle('Certificate No. '.base_convert($signed->id, 10, 16));
            $pdf::AddPage("P");
            $lg['a_meta_charset'] = 'UTF-8';
            $pdf::setLanguageArray($lg);
            $pdf::SetFont('latolatin', '', 12, '', true);

            if (Auth::user()->gender == "f")
            {
                $p = array("She", "her");
            } else if (Auth::user()->gender = "m")
            {
                $p = array("He", "him");
            }

            $pdf::Image(url('/img/herb.png'), '', '15', '', 17, 'PNG');
            $pdf::Image(url('/img/logowmr.png'), '', '', '', 35, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
            $pdf::Image(url('/img/logomosir.png'), '', '16', '', 13, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);
            $html = '<p></p><p></p><p></p><p></p><p></p>
            <p style="text-align:right;">Rybnik, Poland '.date("F j, Y", strtotime($form->calendar->end)).' </p>
            <p></p>
            <p style="text-align:center">It is hereby certified that,</p>
            <p></p>
            <p style="text-align:center; font-weight:bold">'.Auth::user()->firstname.' '.Auth::user()->lastname.'</p>
            <p></p>
            <p style="text-align:center"> took part in voluntary work on '.date("F j, Y", strtotime($form->calendar->end)).' during the organization of</p>
            <p></p>
            <p style="text-align:center; font-weight:bold">'.$form->form_translate->title.'</p>
            <p></p>
            <p style="text-align:center;">'.Auth::user()->firstname.' carried out the tasks entrusted to '.$p[1].' with due diligence and commitment. '.$p[0].' also showed openness and the ability to work in a team, which contributed to the success of the event.</p>
            <p></p><p></p><p></p>
            <table style="width: 100%;">
            <tr style="font-weight:bold;"><td>System administrator</td><td style="text-align:right;">Event organization department</td></tr>
            <tr><td></td></tr>
            <tr><td>Denis Bichler</td><td style="text-align:right;">Wiktoria Wistuba</td></tr>
            </table>';
            $pdf::writeHTML($html, true, false, true, false, '');

            $text1 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p style="font-size:9px; text-align:center;">Unique certificate number: '.$signed->ivid.'</p>';
            $text11 = '<p style="font-size:9px; text-align:center;">The certificate has been generated automatically.</p>';
            $text2 = '<p style="font-size:9px; text-align:center;">To verify the authenticity of the certificate, please write to: administrator@wolontariat.rybnik.pl</p>';
            $pdf::writeHTML($text1, true, false, true, false, '');
            $pdf::writeHTML($text11, true, false, true, false, '');
            $pdf::writeHTML($text2, true, false, true, false, '');

            $pdf::Output('Certificate_no_'.base_convert($signed->id, 10, 16).'.pdf');
        }
    }

    public function feedback(Request $request, $id)
    {
        $request->validate(['info' => 'required|max:255']);
        $form = Form::where('ivid', $id)->firstOrFail();
        Form_sign::where('form_id', $form->id)->where('volunteer_id', Auth::id())->firstOrFail()->update(['feedback' => $request->info]);
        return back()->with(['feedback' => true]);
    }
}
