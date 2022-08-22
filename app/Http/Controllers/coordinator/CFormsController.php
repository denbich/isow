<?php

namespace App\Http\Controllers\coordinator;

use App\Models\Form;
use App\Models\User;
use App\Models\Volunteer_history_point;
use App\Mail\NewForm;
use App\Models\Form_sign;
use App\Models\Volunteer;
use App\Mail\SetPositions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Models\Form_category;
use App\Models\Form_position;
use App\Models\Calendar_event;
use App\Models\Form_translate;
use Elibyy\TCPDF\Facades\TCPDF;
use Shivella\Bitly\Facade\Bitly;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Exports\SignedVolunteerExport;
use App\Models\Form_category_translate;
use App\Models\Form_position_translate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FormCategoryRequest;

class CFormsController extends Controller
{
    public function index()
    {
        $forms = Form::whereHas('calendar', function ($query) {
            return $query->where('end', '>', date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 7 days')));
        })->with(['form_translate', 'calendar', 'form_category'])->withCount('signed_form')->get();

        return view('coordinator.forms.index', ['forms' => $forms]);
    }

    public function create()
    {
        $categories = Form_category::with('form_category_translate')->get();
        return view('coordinator.forms.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
            $vali_positions = [];
            $vali = [];
            if ($request->position_count != 0)
            {
                $vali_positions = [
                    'name_position1' => 'required|string|max:255',
                    'description_position1' => 'required|string|max:255',
                    'points_position1' => 'required|numeric|min:1',
                    'max_position1' => 'required|numeric|min:1',
                    'start_position1' => 'required|date_format:H:i',
                    'end_position1' => 'required|date_format:H:i',
                ];
                for ($i = 2; $i <= $request->position_count; $i++)
                {
                    $vali = [
                        'name_position'.$i => 'required|string|max:255',
                        'description_position'.$i => 'required|string|max:255',
                        'points_position'.$i => 'required|numeric|min:1',
                        'max_position'.$i => 'required|numeric|min:1',
                        'start_position'.$i => 'required|date_format:H:i',
                        'end_position'.$i => 'required|date_format:H:i',
                    ];

                    $vali_positions = array_merge($vali_positions, $vali);
                }
            }

        $vali_options = [
            'position_count' => 'required|numeric|min:1',
            'pl_title' => 'required|string|max:255',
            'pl_description' => 'required',
            'expiration' => 'required|date',
            'start' => 'required|date|after:expiration',
            'stop' => 'required|date|after:start',
            'place_longitude_pol' => 'required',
            'place_latitude_pol' => 'required',
            'icon' => 'required',
            'category' => 'required',
        ];

        $validator = array_merge($vali_options, $vali_positions);
        $validated = $request->validate($validator);

        $image = $this->create_image($validated['icon']);
        Storage::disk('forms')->put($image['imageName'], $image['image']);

        $category = Form_category::where('ivid', $validated['category'])->firstOrFail();

        $form = Form::create([
            'ivid' => Str::uuid(),
            'expiration' => $validated['expiration'],
            'place_longitude' => $validated['place_longitude_pol'],
            'place_latitude' => $validated['place_latitude_pol'],
            'icon_src' => '/forms/'.$image['imageName'],
            'author_id' => Auth::id(),
            'category_id' => $category->id,
            'condition' => '0',
        ]);

        Form_translate::create([
            'form_id' => $form->id,
            'locale' => 'pl',
            'title' => $validated['pl_title'],
            'description' => str_replace('"', "'", str_replace("\r\n", '', $validated['pl_description'])),
        ]);

        for ($i = 1; $i <= $validated['position_count']; $i++)
        {
            $p_points = 'points_position'.$i;
            $p_max = 'max_position'.$i;
            $p_start = 'start_position'.$i;
            $p_end = 'end_position'.$i;
            $position = Form_position::create([
                'ivid' => Str::uuid(),
                'form_id' => $form->id,
                'points' => $request->$p_points,
                'max_volunteer' => $request->$p_max,
                'start' => $request->$p_start,
                'end' => $request->$p_end,
            ]);

            $p_title = 'name_position'.$i;
            $p_desc = 'description_position'.$i;
            Form_position_translate::create([
                'position_id' => $position->id,
                'locale' => 'pl',
                'title' => $request->$p_title,
                'description' => $request->$p_desc,
            ]);
        }

        Calendar_event::create([
            'ivid' => Str::uuid(),
            'form_id' => $form->id,
            'start' => $validated['start'],
            'end' => $validated['stop'],
            'title' => $validated['pl_title'],
        ]);

        $datam = array(
            'subject' => 'Nowy formularz - '.$validated['pl_title'],
            'title' => $validated['pl_title'],
            'expiration' => date('d.m.Y H:i', strtotime($validated['expiration'])),
            'button-text' => 'Zapisz się',
            'button-link' => route('v.form.show', [$form->ivid])
        );

        $volunteers = User::where('role', 'volunteer')->whereHas('settings', function($query){
            $query->where('notifications_email', 1);
        })->pluck('email');

        if(count($volunteers) > 0)
        {
            Mail::bcc($volunteers)->send(new NewForm($datam));
        }

        return redirect()->route('c.form.show', [$form->ivid])->with(['created_form' => true]);
    }

    public function show($id)
    {
        $form = Form::where('ivid', $id)->with('form_translate', 'form_category')->firstOrFail();
        $positions = Form_position::where('form_id', $form->id)->with('form_position_translate')->withCount('signed_form')->get();
        $signs = Form_sign::where('form_id', $form->id)->with(['volunteer', 'position'])->get();
        $volunteers = User::where('role', 'volunteer')->where('id', '!=', $signs->pluck('volunteer.id')->toArray())->with('volunteer')->get();

        return view('coordinator.forms.show', ['form' => $form, 'positions' => $positions, 'signs' => $signs, 'volunteers' => $volunteers]);
    }

    public function edit($id)
    {
        $form = Form::where('ivid', $id)->with(['form_translate', 'calendar'])->firstOrFail();
        $form_positions = Form_position::where('form_id', $form->id)->with('form_position_translate')->get();
        $categories = Form_category::with('form_category_translate')->get();

        return view('coordinator.forms.edit', ['form' => $form,'form_positions' => $form_positions, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $vali_positions = [];
        for ($i = 1; $i <= $request->positions_number; $i++)
        {
            $vali = [
                'name_position'.$i => 'required|string|max:255',
                'description_position'.$i => 'required|string|max:255',
                'points_position'.$i => 'required|numeric|min:1',
                'max_position'.$i => 'required|numeric|min:1',
                'start_position'.$i => 'required|date_format:H:i',
                'end_position'.$i => 'required|date_format:H:i',
            ];

            $vali_positions = array_merge($vali_positions, $vali);
        }

        $vali_options = [
            'positions_number' => 'required|numeric|min:1',
            'pl_title' => 'required|max:255',
            'pl_description' => 'required',
            'start' => 'required|date',
            'stop' => 'required|date|after:start',
            'place_longitude' => 'required',
            'place_latitude' => 'required',
            'icon' => 'nullable',
            'category' => 'required|uuid',
        ];

        $validator = array_merge($vali_options, $vali_positions);
        $validated = $request->validate($validator);

        $form = Form::where('ivid', $id)->firstOrFail();
        $category = Form_category::where('ivid', $validated['category'])->firstOrFail();
        if($validated['icon'] != null)
        {
            $image = $this->create_image($validated['icon']);
            Storage::disk('forms')->delete($form->icon_src);
            Storage::disk('forms')->put($image['imageName'], $image['image']);

            $form->update([
                'icon_src' => '/forms/'.$image['imageName'],
                'category_id' => $category->id,
                'place_longitude' => $validated['place_longitude'],
                'place_latitude' => $validated['place_latitude'],
            ]);
        } else {
            $form->update([
                'category_id' => $category->id,
                'place_longitude' => $validated['place_longitude'],
                'place_latitude' => $validated['place_latitude'],
            ]);
        }

        Form_translate::where('form_id', $form->id)->firstOrFail()->update([
            'title' => $validated['pl_title'],
            'description' => str_replace('"', "'", str_replace("\r\n", '', $validated['pl_description'])),
        ]);

        Calendar_event::where('form_id', $form->id)->firstOrFail()->update([
            'start' => $validated['start'],
            'stop' => $validated['stop'],
        ]);

        for ($i = 1; $i <= $request->positions_number; $i++)
        {
            $tmp = "position_".$i;
            $tmp1 = "points_position".$i;
            $tmp2 = "max_position".$i;
            $tmp3 = "start_position".$i;
            $tmp4 = "end_position".$i;
            Form_position::where('id', $request->$tmp)->firstOrFail()->update([
                'points' => $request->$tmp1,
                'max_volunteer' => $request->$tmp2,
                'start' => $request->$tmp3,
                'end' => $request->$tmp4,
            ]);

            $tmp1 = "name_position".$i;
            $tmp2 = "description_position".$i;
            Form_position_translate::where('position_id', $request->$tmp)->firstOrFail()->update([
                'title' => $request->$tmp1,
                'description' => $request->$tmp2,
            ]);
        }
        return back()->with(['edit_form' => true]);
    }

    public function destroy($id)
    {
        Form::where('ivid', $id)->firstOrFail()->delete();
        return redirect()->route('c.form.list')->with(['delete_form' => true]);
    }

    public function generate_list(Request $request, Excel $excel, $id)
    {
        $form = Form::where('ivid', $id)->with('form_translate')->firstOrFail();
        switch ($request->filetype)
        {
            case 'pdf':
                $signed_volunteers = Form_sign::where('form_id', $form->id)->with(['volunteer', 'position'])->get();

                $pdf = new TCPDF();
                $pdf::SetTitle('Lista wolontariuszy');
                $pdf::AddPage("L");
                $lg['a_meta_charset'] = 'UTF-8';
                $pdf::setLanguageArray($lg);
                $pdf::SetFont('latolatin','b',15); //dejavusans

                $pdf::Image(url('/img/logowmr.png'), '', 4, '', 30, 'PNG');
                $pdf::Image(url($form->icon_src), '', 8, '', 22, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
                $pdf::Image(url('/img/logomosir.png'), '', 12, '', 12, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);
                $pdf::writeHTML("<p></p><p></p><p></p>", true, false, true, false, '');

                $pdf::Cell(0, 15, $form->form_translate->title.' - Lista zapisanych wolontariuszy', 0, '1', 'C', 0, '', 0, false, 'M', 'M');

                $pdf::SetFont('latolatin','',10);
                $pdf::Cell(0, 10, 'Podpisując się niżej, oświadczasz iż jesteś zdrowy/a (w dniu imprezy nie wykazuję/ą objawów infekcji oraz objawów chorobowych sugerujących chorobę zakaźną) ', 0, '1', 'C', 0, '', 0, false, 'M', 'M');
                $pdf::Cell(0, 10, 'oraz w okresie 14 dni przed imprezą nie przebywałem/am/ali z osobą na kwarantannie oraz nie miałem/am/mieli kontaktu z osobą podejrzaną o zakażenie.', 0, '1', 'C', 0, '', 0, false, 'M', 'M');

                $pdf::SetFont('latolatin','b',10);

                $pdf::cell('35','10','Login','1','0','C');
                $pdf::cell('45','10','Imię','1','0','C');
                $pdf::cell('45','10','Nazwisko','1','0','C');
                $pdf::cell('35','10','Nr telefonu','1','0','C');
                $pdf::cell('20','10','Koszulka','1','0','C');
                $pdf::cell('55','10','Stanowisko','1','0','C');
                $pdf::cell('40','10','Podpis','1','1','C');

                $pdf::SetFont('latolatin','',10);

                foreach ($signed_volunteers as $sign)
                {
                    $pdf::cell('35','10', $sign->volunteer->name,'1','0','C');
                    $pdf::cell('45','10', $sign->volunteer->firstname,'1','0','C');
                    $pdf::cell('45','10', $sign->volunteer->lastname,'1','0','C');
                    $pdf::cell('35','10' ,$sign->volunteer->telephone,'1','0','C');
                    $pdf::cell('20','10', strtoupper($sign->volunteer->volunteer->tshirt_size),'1','0','C');
                    $pdf::cell('55','10', $sign->position->form_position_translate->title,'1','0','C');
                    $pdf::cell('40','10', "",'1','1','C');
                }

                $pdf::Output( $form->form_translate->title.'_lista_wolontariuszy.pdf');
            break;

            case 'excel':
                return $excel->download(new SignedVolunteerExport($form->ivid), $form->form_translate->title.'_lista_wolontariuszy.xlsx');
            break;

            case 'html':
                return $excel->download(new SignedVolunteerExport($form->ivid), $form->form_translate->title.'_lista_wolontariuszy.html');
            break;
        }

    }

    public function stop_sign($id)
    {
        Form::where('ivid', $id)->firstOrFail()->update(['expiration' => date('Y-m-d H:i')]);
        return back()->with(['succes_stop' => true]);
    }

    public function archive()
    {
        $forms = Form::whereHas('calendar', function ($query) {
            return $query->where('end', '<', date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' - 7 days')));
        })->with(['form_translate', 'calendar'])->withCount('signed_form')->get();
        return view('coordinator.forms.archive', ['forms' => $forms]);
    }

    public function start_sign(Request $request, $id)
    {
        $validated = $request->validate(['end' => 'required|after: '.date('Y-m-d H:i')]);
        Form::where('ivid', $id)->firstOrFail()->update(['expiration' => $validated['end']]);

        return back()->with(['succes_start' => true]);
    }

    public function positions($id)
    {
        $form = Form::where('ivid', $id)->with('form_translate')->firstOrFail();
        $form_positions = Form_position::where('form_id', $form->id)->with('form_position_translate')->withCount('signed_form')->get();
        $signed_volunteers = Form_sign::where('form_id', $form->id)->with(['volunteer', 'position'])->get();

        return view('coordinator.forms.positions', ['form' => $form,'form_positions' => $form_positions, 'signed_volunteers' => $signed_volunteers]);
    }

    public function set_positions(Request $request, $id)
    {
        $form = Form::where('ivid', $id)->with('form_translate')->firstOrFail();
        $signed_volunteers = Form_sign::where('form_id', $form->id)->with('form')->get();
        foreach ($signed_volunteers as $sign)
        {
            $v_id = $sign->id;
            $sign->position_id = $request->$v_id;
            $sign->condition = 1;
            $sign->save();
        }

        $datam = array(
            'subject' => 'Stanowiska zostały przydzielone na imprezę '.$form->form_translate->title,
            'title' => $form->form_translate->title,
            'link' => route('v.form.show', [$id]),
        );

        Mail::bcc(Form_sign::where('form_id', $form->id)->with('volunteer')->get()->pluck('volunteer.email'))->send(new SetPositions($datam));
        return back()->with(['succes_set' => true]);
    }

    public function presence($id)
    {
        $form = Form::where('ivid', $id)->with('form_translate')->firstOrFail();
        $signed_volunteers = Form_sign::where('form_id', $form->id)->with(['volunteer', 'position'])->get();

        return view('coordinator.forms.presence', ['form' => $form,'signed_volunteers' => $signed_volunteers]);
    }

    public function save_presence(Request $request, $id)
    {
        $signed_volunteers = Form_sign::whereHas('form', function ($query) use ($id){
            $query->where('ivid', $id);})->with('position', 'form')->get();
        foreach ($signed_volunteers as $sign)
        {
            $v_id = $sign->id;
            if ($request->$v_id == "true")
            {
                $volunteer = Volunteer::where('user_id', $sign->volunteer_id)->firstOrFail();
                $points = $volunteer->points + $sign->position->points;
                $volunteer->points = $points;

                $volunteer->update(['points' => $points]);
                $sign->update(['condition' => 3]);

                Volunteer_history_point::create([
                    'volunteer_id' => $volunteer->user_id,
                    'reason' => 4,
                    'form_id' => $sign->form->id,
                    'coordinator_id' => Auth::id(),
                    'points' => $sign->position->points,
                ]);
                $volunteer->save();
            } elseif ($request->$v_id == "false") {
                $sign->update(['condition' => 2]);
            }
        }

        return redirect()->route('c.form.show', [$id])->with(['succes_presence' => true]);
    }

    /*public function sign($id)
    {
        return back();
        $form = Form::where('ivid', $id)->with('form_translate')->firstOrFail();
        $form_positions = Form_position::where('form_id', $form->id)->with('form_position_translate')->withCount('signed_form')->get();
        $signed_volunteers = Form_sign::where('form_id', $form->id)->where('condition', 1)->with(['volunteer', 'position'])->get();

        return view('coordinator.forms.sign', ['form' => $form,'form_positions' => $form_positions, 'signed_volunteers' => $signed_volunteers]);
    }

    public function save_sign(Request $request)
    {
        if($request->ajax())
        {
            $image_64 = $request->sign;
            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
            $replace = substr($image_64, 0, strpos($image_64, ',')+1);
            $image = str_replace($replace, '', $image_64);
            $image = str_replace(' ', '+', $image);

            $imageName = Str::random(100).time().'.'.$extension;
            $file = Storage::disk('forms')->put('sign/'.$imageName, base64_decode($image));

            $filepath = '/forms/sign/'.$imageName;
            $form = Signed_form::where('volunteer_id', $request->volunteer_id)->where('form_id', $request->form_id)->with('post_form')->firstOrFail();
            Form_signature::create([
                'form_id' => $request->form_id,
                'volunteer_id' => $request->volunteer_id,
                'sign_id' => $form->id,
                'sign_path' => $filepath,
            ]);

            $volunteer = Volunteer::where('user_id', $request->volunteer_id)->firstOrFail();
            $points = $volunteer->points + $form->post_form->points;
            $volunteer->points = $points;

            $form->condition = 3;
            $volunteer->save();
            $form->save();

            return true;
        }
    }

    public function reject_sign(Request $request)
    {
        if($request->ajax())
        {
            $form = Signed_form::where('volunteer_id', $request->volunteer_id)->where('form_id', $request->form_id)->firstOrFail();
            $form->condition = 2;
            $form->save();

            return true;
        }
    }*/

    public function view_presence($id)
    {
        $form = Form::where('ivid', $id)->with('form_translate')->firstOrFail();
        $signed_volunteers = Form_sign::where('form_id', $form->id)->with(['volunteer', 'position'])->get();

        return view('coordinator.forms.viewpresence', ['form' => $form, 'signed_volunteers' => $signed_volunteers]);
    }

    public function generate_id(Request $request, $id)
    {
        $validated = $request->validate(['theme' => 'required|numeric|max:5']);

        $pdf = new TCPDF();
        $pdf::SetTitle('Indentyfikatory');
        $lg['a_meta_charset'] = 'UTF-8';
        $pdf::setLanguageArray($lg);
        $pdf::SetFont('latolatin','b',15);
        $bMargin = $pdf::getBreakMargin();
        $auto_page_break = $pdf::getAutoPageBreak();
        $pdf::SetAutoPageBreak(false, 0);

        $form = Form::where('ivid', $id)->firstOrFail();
        $volunteers = Form_sign::where('form_id', $form->id)->with('form', 'volunteer', 'position')->get();

        switch($validated['theme'])
        {
            case(1):
                foreach($volunteers as $volunteer)
                {
                    $pdf::AddPage("P");
                    $pdf::SetAutoPageBreak(0, 0);
                    if($request->logocustom == "on")
                    {
                        $pdf::Image(url('/img/id/1b.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        $pdf::Image(url($form->icon_src), 32, 7, '', 37, 'PNG');
                    } else {
                        $pdf::Image(url('/img/id/1a.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                    }

                    $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                    $pdf::setPageMark();
                    $pdf::write2DBarcode(route('volunteer.id', $volunteer->volunteer->ivid), 'QRCODE,Q', 122, 148, 39, 39);
                    $pdf::image(url($volunteer->volunteer->photo_src), 21, 111, 76, 76);
                    $html1 = '<p></p><p></p><p></p><p></p><p></p><h1 style="text-align:center; width:100%; font-size: 40px;">'.$volunteer->form->form_translate->title.'</h1>';
                    $pdf::SetFont('latob','b',15);
                    $pdf::writeHTMLCell(0, 0, '', '15', $html1, 0, 1, 0, true, '', true);
                    $pdf::SetFont('latolatin','',15);

                    $html2 = '<p></p>
                    <table>
                    <tr> <td></td> <td style="font-size: 30px;">'.$volunteer->volunteer->firstname.'</td> </tr>
                    <tr> <td></td> <td style="font-size: 30px;">'.$volunteer->volunteer->lastname.'</td> </tr>
                    </table>';
                    $pdf::writeHTML($html2, true, false, true, false, '');

                    $html3 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
                    <h1 style="text-align:center;font-size:35px;">'.Str::upper($volunteer->position->form_position_translate->title).'</h1>';
                    $pdf::writeHTML($html3, true, false, true, false, '');

                    if($request->withnumbers == "on")
                    {
                        $pdf::SetAutoPageBreak(0, 0);
                        $pdf::AddPage("P");
                        if($request->logocustom == "on")
                        {
                            $pdf::Image(url('/img/id/back1.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                            $pdf::Image(url($form->icon_src), 32, 262, '', 27, 'PNG');
                        } else {
                            $pdf::Image(url('/img/id/back2.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        }
                        $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                        $html3 = '<p></p><p></p><p></p><p></p><p></p>
                        <h1 style="text-align:center;">'.$request->name1.'</h1>
                        <h1 style="text-align:center;">'.$request->number1.'</h1>
                        <h1 style="text-align:center;">'.$request->name2.'</h1>
                        <h1 style="text-align:center;">'.$request->number2.'</h1>
                        <h1 style="text-align:center;">'.$request->name3.'</h1>
                        <h1 style="text-align:center;">'.$request->number3.'</h1>
                        <h1 style="text-align:center;">'.$request->name4.'</h1>
                        <h1 style="text-align:center;">'.$request->number4.'</h1>
                        <h1 style="text-align:center;">'.$request->name5.'</h1>
                        <h1 style="text-align:center;">'.$request->number5.'</h1>
                        <h1 style="text-align:center;">'.$request->name6.'</h1>
                        <h1 style="text-align:center;">'.$request->number6.'</h1>
                        <p style="font-size:5px;"></p>';
                        $pdf::writeHTMLCell(0, 0, '', '15', $html3, 0, 1, 0, true, '', true);
                    }

                }
                break;
            case(2):
                foreach($volunteers as $volunteer)
                {
                    $pdf::AddPage("P");
                    $pdf::SetAutoPageBreak(0, 0);

                    if($request->logocustom == "on")
                    {
                        $pdf::Image(url('/img/id/2b.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        $pdf::Image(url($form->icon_src), 32, 7, '', 37, 'PNG');
                    } else {
                        $pdf::Image(url('/img/id/2a.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                    }

                    if($request->withnumbers == "on")
                    {
                        $pdf::SetAutoPageBreak(0, 0);
                        $pdf::AddPage("P");
                        if($request->logocustom == "on")
                        {
                            $pdf::Image(url('/img/id/back1.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                            $pdf::Image(url($form->icon_src), 32, 262, '', 27, 'PNG');
                        } else {
                            $pdf::Image(url('/img/id/back2.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        }
                        $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                        $html3 = '<p></p><p></p><p></p><p></p><p></p>
                        <h1 style="text-align:center;">'.$request->name1.'</h1>
                        <h1 style="text-align:center;">'.$request->number1.'</h1>
                        <h1 style="text-align:center;">'.$request->name2.'</h1>
                        <h1 style="text-align:center;">'.$request->number2.'</h1>
                        <h1 style="text-align:center;">'.$request->name3.'</h1>
                        <h1 style="text-align:center;">'.$request->number3.'</h1>
                        <h1 style="text-align:center;">'.$request->name4.'</h1>
                        <h1 style="text-align:center;">'.$request->number4.'</h1>
                        <h1 style="text-align:center;">'.$request->name5.'</h1>
                        <h1 style="text-align:center;">'.$request->number5.'</h1>
                        <h1 style="text-align:center;">'.$request->name6.'</h1>
                        <h1 style="text-align:center;">'.$request->number6.'</h1>
                        <p style="font-size:5px;"></p>';
                        $pdf::writeHTMLCell(0, 0, '', '15', $html3, 0, 1, 0, true, '', true);
                    }
                }
                break;
            case(3):
                foreach($volunteers as $volunteer)
                {
                    $pdf::AddPage("P");
                    $pdf::SetAutoPageBreak(0, 0);

                    $pdf::Image(url('/img/id/3.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

                    $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                    $pdf::setPageMark();

                    $pdf::SetFont('latob','b',15);
                    $html1 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><h1 style="text-align:center; width:100%; font-size: 40px; font-weight:bold;">'.Str::upper($volunteer->form->form_translate->title).'</h1>';
                    $pdf::writeHTMLCell(0, 0, '', '15', $html1, 0, 1, 0, true, '', true);
                    $pdf::SetFont('latolatin','b',15);
                    //Bitly::getUrl(route('volunteer.id', $volunteer->volunteer->ivid))
                    $pdf::write2DBarcode(route('volunteer.id', $volunteer->volunteer->ivid), 'QRCODE,Q', 127, 167, 39, 39);
                    $pdf::image(url($volunteer->volunteer->photo_src), 21, 130, 76, 76);

                    $html2 = '<p></p>
                    <table>
                    <tr> <td></td> <td style="font-size: 30px;">'.$volunteer->volunteer->firstname.'</td> </tr>
                    <tr> <td></td> <td style="font-size: 30px;">'.$volunteer->volunteer->lastname.'</td> </tr>
                    </table>';
                    $pdf::writeHTML($html2, true, false, true, false, '');

                    $html3 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
                    <h1 style="text-align:center;font-size:35px;">'.Str::upper($volunteer->position->form_position_translate->title).'</h1>';
                    $pdf::writeHTML($html3, true, false, true, false, '');

                    if($request->withnumbers == "on")
                    {
                        $pdf::SetAutoPageBreak(0, 0);
                        $pdf::AddPage("P");
                        if($request->logocustom == "on")
                        {
                            $pdf::Image(url('/img/id/back1.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                            $pdf::Image(url($form->icon_src), 32, 262, '', 27, 'PNG');
                        } else {
                            $pdf::Image(url('/img/id/back2.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        }
                        $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                        $html3 = '<p></p><p></p><p></p><p></p><p></p>
                        <h1 style="text-align:center;">'.$request->name1.'</h1>
                        <h1 style="text-align:center;">'.$request->number1.'</h1>
                        <h1 style="text-align:center;">'.$request->name2.'</h1>
                        <h1 style="text-align:center;">'.$request->number2.'</h1>
                        <h1 style="text-align:center;">'.$request->name3.'</h1>
                        <h1 style="text-align:center;">'.$request->number3.'</h1>
                        <h1 style="text-align:center;">'.$request->name4.'</h1>
                        <h1 style="text-align:center;">'.$request->number4.'</h1>
                        <h1 style="text-align:center;">'.$request->name5.'</h1>
                        <h1 style="text-align:center;">'.$request->number5.'</h1>
                        <h1 style="text-align:center;">'.$request->name6.'</h1>
                        <h1 style="text-align:center;">'.$request->number6.'</h1>
                        <p style="font-size:5px;"></p>';
                        $pdf::writeHTMLCell(0, 0, '', '15', $html3, 0, 1, 0, true, '', true);
                    }
                }
                break;
            case(4):
                foreach($volunteers as $volunteer)
                {
                    $pdf::AddPage("P");
                    $pdf::SetAutoPageBreak(0, 0);
                    if($request->logocustom == "on")
                    {
                        $pdf::Image(url('/img/id/4b.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        $pdf::Image(url($form->icon_src), 28, 7, '', 37, 'PNG');
                    } else {
                        $pdf::Image(url('/img/id/4a.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                    }

                    $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                    $pdf::setPageMark();

                    $pdf::SetFont('latob','b',15);
                    $html1 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><h1 style="color:#73b644; text-align:center; width:100%; font-size: 27px;">'.$volunteer->form->form_translate->title.'</h1>';
                    $pdf::writeHTMLCell(0, 0, '', '15', $html1, 0, 1, 0, true, '', true);

                    $pdf::SetFont('latolatin','',15);
                    $pdf::write2DBarcode(route('volunteer.id', $volunteer->volunteer->ivid), 'QRCODE,Q', 31, 104, 65, 65);

                    $imageurl = url($volunteer->volunteer->photo_src);
                    $pdf::image($imageurl, '115', '104', '65', '65');

                    $html2a = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
                    <h1 style="text-align:center;">'.$volunteer->volunteer->firstname.'</h1>
                    <p style="font-size:5px;"></p>
                    <h1 style="text-align:center">'.$volunteer->volunteer->lastname.'</h1>
                    <p style="font-size:5px;"></p>
                    <h1 style="text-align:center">'.$volunteer->volunteer->name.'</h1>';
                    $pdf::writeHTMLCell(0, 0, '', '15', $html2a, 0, 1, 0, true, '', true);

                    $pdf::SetFont('latob','b',15);
                    $html2b = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
                    <h2 style="text-align:center; color:#283b9b; font-size:35px;">'.$volunteer->position->form_position_translate->title.'</h2>';
                    $pdf::writeHTMLCell(0, 0, '', '15', $html2b, 0, 1, 0, true, '', true);
                    $pdf::SetFont('latolatin','',15);

                    if($request->withnumbers == "on")
                    {
                        $pdf::SetAutoPageBreak(0, 0);
                        $pdf::AddPage("P");
                        if($request->logocustom == "on")
                        {
                            $pdf::Image(url('/img/id/back1.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                            $pdf::Image(url($form->icon_src), 32, 262, '', 27, 'PNG');
                        } else {
                            $pdf::Image(url('/img/id/back2.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        }
                        $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                        $html3 = '<p></p><p></p><p></p><p></p><p></p>
                        <h1 style="text-align:center;">'.$request->name1.'</h1>
                        <h1 style="text-align:center;">'.$request->number1.'</h1>
                        <h1 style="text-align:center;">'.$request->name2.'</h1>
                        <h1 style="text-align:center;">'.$request->number2.'</h1>
                        <h1 style="text-align:center;">'.$request->name3.'</h1>
                        <h1 style="text-align:center;">'.$request->number3.'</h1>
                        <h1 style="text-align:center;">'.$request->name4.'</h1>
                        <h1 style="text-align:center;">'.$request->number4.'</h1>
                        <h1 style="text-align:center;">'.$request->name5.'</h1>
                        <h1 style="text-align:center;">'.$request->number5.'</h1>
                        <h1 style="text-align:center;">'.$request->name6.'</h1>
                        <h1 style="text-align:center;">'.$request->number6.'</h1>
                        <p style="font-size:5px;"></p>';
                        $pdf::writeHTMLCell(0, 0, '', '15', $html3, 0, 1, 0, true, '', true);
                    }
                }
                break;
            case(5):
                foreach($volunteers as $volunteer)
                {
                    $pdf::AddPage("P");
                    $pdf::SetAutoPageBreak(0, 0);
                    if($request->logocustom == "on")
                    {
                        $pdf::Image(url('/img/id/5b.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        $pdf::Image(url($form->icon_src), 32, 7, '', 37, 'PNG');
                    } else {
                        $pdf::Image(url('/img/id/5a.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                    }

                    $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                    $pdf::setPageMark();

                    $pdf::SetFont('latob','b',15);
                    $html1 = '<p></p><p></p><p></p><p></p><p></p><h1 style="color:#204186; text-align:center; width:100%; font-size: 30px;">'.$volunteer->form->form_translate->title.'</h1>';
                    $pdf::writeHTMLCell(0, 0, '', '15', $html1, 0, 1, 0, true, '', true);
                    $pdf::SetFont('latolatin','',15);

                    $pdf::write2DBarcode(route('volunteer.id', $volunteer->volunteer->ivid), 'QRCODE,Q', 31, 84, 65, 65);

                    $imageurl = url($volunteer->volunteer->photo_src);
                    $pdf::image($imageurl, '115', '84', '65', '65');

                    $html2a = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
                    <h1 style="text-align:center;">'.$volunteer->volunteer->firstname.'</h1>
                    <p style="font-size:5px;"></p>
                    <h1 style="text-align:center">'.$volunteer->volunteer->lastname.'</h1>
                    <p style="font-size:5px;"></p>
                    <h1 style="text-align:center">'.$volunteer->volunteer->name.'</h1>
                    <h2 style="text-align:center; color:#283b9b; font-size:35px;">';
                    $pdf::writeHTMLCell(0, 0, '', '15', $html2a, 0, 1, 0, true, '', true);

                    $pdf::SetFont('latob','b',15);
                    $html2b = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
                    <h2 style="text-align:center; color:#283b9b; font-size:35px;">'.$volunteer->position->form_position_translate->title.'</h2>';
                    $pdf::writeHTMLCell(0, 0, '', '15', $html2b, 0, 1, 0, true, '', true);
                    $pdf::SetFont('latolatin','',15);

                    if($request->withnumbers == "on")
                    {
                        $pdf::SetAutoPageBreak(0, 0);
                        $pdf::AddPage("P");
                        if($request->logocustom == "on")
                        {
                            $pdf::Image(url('/img/id/back1.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                            $pdf::Image(url($form->icon_src), 32, 262, '', 27, 'PNG');
                        } else {
                            $pdf::Image(url('/img/id/back2.png'), 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                        }
                        $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
                        $html3 = '<p></p><p></p><p></p><p></p><p></p>
                        <h1 style="text-align:center;">'.$request->name1.'</h1>
                        <h1 style="text-align:center;">'.$request->number1.'</h1>
                        <h1 style="text-align:center;">'.$request->name2.'</h1>
                        <h1 style="text-align:center;">'.$request->number2.'</h1>
                        <h1 style="text-align:center;">'.$request->name3.'</h1>
                        <h1 style="text-align:center;">'.$request->number3.'</h1>
                        <h1 style="text-align:center;">'.$request->name4.'</h1>
                        <h1 style="text-align:center;">'.$request->number4.'</h1>
                        <h1 style="text-align:center;">'.$request->name5.'</h1>
                        <h1 style="text-align:center;">'.$request->number5.'</h1>
                        <h1 style="text-align:center;">'.$request->name6.'</h1>
                        <h1 style="text-align:center;">'.$request->number6.'</h1>
                        <p style="font-size:5px;"></p>';
                        $pdf::writeHTMLCell(0, 0, '', '15', $html3, 0, 1, 0, true, '', true);
                    }
                }
                break;
        }

        $pdf::Output('indetyfikatory.pdf');
    }

    public function generate_raport($ivid)
    {
        $form = Form::where('ivid', $ivid)->with('form_translate', 'form_category')->firstOrFail();
        $form_positions = Form_position::where('form_id', $form->id)->with('form_position_translate', 'signed')->withCount('signed_form')->get();
        $signed_volunteers = Form_sign::where('form_id', $form->id)->with(['volunteer', 'position'])->get();

        $pdf_position = '';
        $pdf_sign = '';
        foreach($form_positions as $position)
        {
            if(!empty($position->signed))
            {
                foreach($position->signed as $sign)
                {
                    $pdf_sign = $pdf_sign."<li>".$sign->volunteer->firstname." ".$sign->volunteer->lastname."</li>";
                }
            } else {
                $pdf_sign = "Brak!";
            }
            $pdf_position = $pdf_position."<li><b>".$position->form_position_translate->title." (".date('H:i', strtotime($position->start))." - ".date('H:i', strtotime($position->end)).")</b><br><br>".$position->form_position_translate->description."<br><br>Zapisani wolontariusze: <ul>".$pdf_sign."</ul></li><br>";
            $pdf_sign = '';
        }

        $pdf = new TCPDF();
        $pdf::SetTitle('Raport');
        $lg['a_meta_charset'] = 'UTF-8';
        $pdf::setLanguageArray($lg);
        $pdf::SetFont('latolatin','b',15);
        $bMargin = $pdf::getBreakMargin();
        $auto_page_break = $pdf::getAutoPageBreak();
        $pdf::SetAutoPageBreak(false, 0);

        $pdf::AddPage("P");
        $pdf::SetAutoPageBreak($auto_page_break, $bMargin);
        $pdf::setPageMark();

        $pdf::Image(url('/img/logowmr.png'), '', '5', '', 37, 'PNG');
        $pdf::Image(url($form->icon_src), '', '6', '', 35, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
        $pdf::Image(url('/img/logomosir.png'), '', '18', '', 15, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);

        $html1 = '<p></p><p></p><p></p><p></p><p></p><h1 style="text-align:center;">'.$form->form_translate->title.'</h1>';
        $html2 = '<p></p>
        <ol>
            <li><b>Podstawowe informacje o wydarzeniu:</b></li>
            <ul>
                <li>Kategoria: '.$form->form_category->form_category_translate->name.'</li>
                <li>Data rozpoczęcia: '.date('d.m.Y H:i', strtotime($form->calendar->start)).'</li>
                <li>Data zakończenia: '.date('d.m.Y H:i', strtotime($form->calendar->end)).'</li>
                <li>Ilość zapisanych wolontariuszy: '.count($signed_volunteers).'</li>
            </ul>
            <p></p>
            <li><b>Opis formularza:</b></li>
            '.$form->form_translate->description.'
        </ol>';
        $html3 = '<p></p><p></p><p></p><p></p><p></p>
        <ol start="3">
            <li><b>Stanowiska:</b>
                <ul>
                    '.$pdf_position.'
                </ul>
            </li>
        </ol>
        ';
        $html4 = '<p></p><p></p><p></p><p></p><p></p><p></p>
        <ol start="4">
            <li><b>Lista zapisanych wolontariuszy</b>
            </li>
        </ol><p></p>';

        $html5 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><h1 style="text-align:center;">Notatki</h1>';
        $pdf::writeHTML($html1, true, false, true, false, '');
        $pdf::SetFont('latolatin','',11);
        $pdf::writeHTML($html2, true, false, true, false, '');
        $pdf::AddPage("P");
        $pdf::Image(url('/img/logowmr.png'), '', '5', '', 37, 'PNG');
        $pdf::Image(url($form->icon_src), '', '6', '', 35, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
        $pdf::Image(url('/img/logomosir.png'), '', '18', '', 15, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);
        $pdf::writeHTML($html3, true, false, true, false, '');
        $pdf::AddPage("P");
        $pdf::Image(url('/img/logowmr.png'), '', '5', '', 37, 'PNG');
        $pdf::Image(url($form->icon_src), '', '6', '', 35, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
        $pdf::Image(url('/img/logomosir.png'), '', '18', '', 15, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);
        $pdf::writeHTML($html4, true, false, true, false, '');
        $pdf::SetFont('latolatin','b',10);

        $pdf::cell('55','10','Imię i nazwisko','1','0','C');
        $pdf::cell('35','10','Nr telefonu','1','0','C');
        $pdf::cell('20','10','Koszulka','1','0','C');
        $pdf::cell('65','10','Stanowisko','1','0','C');
        $pdf::cell('15','10','✓','1','1','C');

        $pdf::SetFont('latolatin','', 10);

        foreach ($signed_volunteers as $sign)
        {
            $pdf::cell('55','10', $sign->volunteer->firstname." ".$sign->volunteer->lastname,'1','0','C');
            $pdf::cell('35','10' ,$sign->volunteer->telephone,'1','0','C');
            $pdf::cell('20','10', strtoupper($sign->volunteer->volunteer->tshirt_size),'1','0','C');
            $pdf::cell('65','10', $sign->position->form_position_translate->title,'1','0','C');
            $pdf::cell('15','10','','1','1','C');
        }
        $pdf::AddPage("P");
        $pdf::Image(url('/img/logowmr.png'), '', '5', '', 37, 'PNG');
        $pdf::Image(url($form->icon_src), '', '6', '', 35, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
        $pdf::Image(url('/img/logomosir.png'), '', '18', '', 15, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);
        $pdf::writeHTML($html5, true, false, true, false, '');

        $pdf::AddPage("L");
        $pdf::Image(url('/img/logowmr.png'), '', '8', '', 24, 'PNG');
        $pdf::Image(url($form->icon_src), '', '8', '', 22, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
        $pdf::Image(url('/img/logomosir.png'), '', '12', '', 12, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);

        $pdf::writeHTML("<p></p><p></p><p></p><p></p><p></p>", true, false, true, false, '');
        $pdf::SetFont('latolatin','b',15);
        $pdf::Cell(0, 15, $form->form_translate->title.' - Lista zapisanych wolontariuszy', 0, '1', 'C', 0, '', 0, false, 'M', 'M');

        $pdf::SetFont('latolatin','',10);

        $pdf::Cell(0, 10, 'Podpisując się niżej, oświadczasz iż jesteś zdrowy/a (w dniu imprezy nie wykazuję/ą objawów infekcji oraz objawów chorobowych sugerujących chorobę zakaźną) ', 0, '1', 'C', 0, '', 0, false, 'M', 'M');
        $pdf::Cell(0, 10, 'oraz w okresie 14 dni przed imprezą nie przebywałem/am/ali z osobą na kwarantannie oraz nie miałem/am/mieli kontaktu z osobą podejrzaną o zakażenie.', 0, '1', 'C', 0, '', 0, false, 'M', 'M');

        $pdf::SetFont('latolatin','b',10);

        $pdf::cell('35','10','Login','1','0','C');
        $pdf::cell('80','10','Imię i nazwisko','1','0','C');
        $pdf::cell('35','10','Nr telefonu','1','0','C');
        $pdf::cell('20','10','Koszulka','1','0','C');
        $pdf::cell('65','10','Stanowisko','1','0','C');
        $pdf::cell('40','10','Podpis','1','1','C');

        $pdf::SetFont('latolatin','',10);

                foreach ($signed_volunteers as $sign)
                {
                    $pdf::cell('35','10', $sign->volunteer->name,'1','0','C');
                    $pdf::cell('80','10',$sign->volunteer->firstname." ".$sign->volunteer->lastname,'1','0','C');
                    $pdf::cell('35','10' ,$sign->volunteer->telephone,'1','0','C');
                    $pdf::cell('20','10', strtoupper($sign->volunteer->volunteer->tshirt_size),'1','0','C');
                    $pdf::cell('65','10', $sign->position->form_position_translate->title,'1','0','C');
                    $pdf::cell('40','10', "",'1','1','C');
                }

        $pdf::Output('raport.pdf');
    }

    public function create_category(FormCategoryRequest $request)
    {
        if($request->ajax())
        {
            $validated = $request->validated();
            $category = Form_category::create([
                'ivid' => Str::uuid(),
                'author_id' => Auth::id(),
                'icon' => $validated['icon'],
                'color' => $validated['color'],
            ]);

            $category_translate = Form_category_translate::create([
                'locale' => 'pl',
                'category_id' => $category->id,
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);

            $cat = [
                'ivid' => $category->ivid,
                'name' => $category_translate->name,
            ];
            return response()->json($cat);
        }
    }

    public function add_volunteer(Request $request, $id)
    {
        $validated = $request->validate([
            'volunteer' => 'required|uuid',
            'position' => 'required|uuid',
        ]);
        $user = User::where('ivid', $validated['volunteer'])->firstOrFail();
        $position = Form_position::where('ivid', $validated['position'])->firstOrFail();
        $form = Form::where('ivid', $id)->firstOrFail();
        Form_sign::create([
            'ivid' => Str::uuid(),
            'volunteer_id' => $user->id,
            'form_id' => $form->id,
            'position_id' => $position->id,
            'choosen_position_id' => $position->id,
            'condition' => 0
        ]);
        return back()->with(['add_volunteer' => true]);
    }

    public function remove_volunteer(Request $request)
    {
        $validated = $request->validate([
            'ivid' => 'required|uuid'
        ]);

        $user = User::where('ivid', $validated['ivid'])->firstOrFail();
        Form_sign::where('volunteer_id', $user->id)->firstOrFail()->delete();
        return back()->with(['remove_volunteer' => true]);
    }
}
