<?php

namespace App\Http\Controllers\coordinator;

use App\Models\User;
use App\Models\Prize;
use App\Models\Volunteer;
use App\Models\Prize_order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\Prize_combination;
use App\Models\Prize_order_status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Volunteer_history_point;

class CPrizeOrderController extends Controller
{
    public function index()
    {
        $orders = Prize_order::with('volunteer', 'prize')->orderBy('id', 'DESC')->get();
        $volunteers = User::where('role', 'volunteer')->get();
        $prizes = Prize::with('prize_translate', 'combinations')->get();
        return view('coordinator.prizes.orders.index', ['orders' => $orders, 'volunteers' => $volunteers, 'prizes' => $prizes]);
    }

    public function show($id)
    {
        $order = Prize_order::where('ivid', $id)->with(['volunteer', 'prize', 'combination', 'status'])->firstOrFail();
        return view('coordinator.prizes.orders.show', ['order' => $order]);
    }

    public function create(Request $request)
    {

        $prize = Prize::where('ivid', $request->prizes)->firstOrFail();
        if($prize->with_combinations == 1)
        {
            $validated = $request->validate([
                'prizes' => 'required|uuid',
                'select_combination'.$prize->id => 'required|uuid',
                'volunteers' => 'required|uuid',
                'info' => 'nullable|max:255',
            ]);
            $volunteer = User::where('ivid', $validated['volunteers'])->with('volunteer')->firstOrFail();

            if($volunteer->volunteer->points < $prize->points && $request->volunteercheck == "on") return back()->with(['not_enough_points' => true]);

            $combination = Prize_combination::where('ivid', $validated['select_combination'.$prize->id])->first();
            $order = Prize_order::create([
                'ivid' => Str::uuid(),
                'prize_id' => $prize->id,
                'volunteer_id' => $volunteer->id,
                'combiation_id' => $combination->id,
                'info' => $validated['info'],
                'volunteer_points' => $volunteer->volunteer->points,
                'prize_points' => $prize->points,
            ]);
        } else {
            $validated = $request->validate([
                'prizes' => 'required|uuid',
                'volunteers' => 'required|uuid',
                'info' => 'nullable|max:255',
            ]);
            $volunteer = User::where('ivid', $validated['volunteers'])->with('volunteer')->firstOrFail();
            if($volunteer->volunteer->points < $prize->points && $request->volunteercheck == "on") return back()->with(['not_enough_points' => true]);
            $order = Prize_order::create([
                'ivid' => Str::uuid(),
                'prize_id' => $prize->id,
                'volunteer_id' => $volunteer->id,
                'info' => $validated['info'],
                'volunteer_points' => $volunteer->volunteer->points,
                'prize_points' => $prize->points,
            ]);
        }

        if($request->volunteercheck == "on")
        {
            $points = $volunteer->volunteer->points - $prize->points;
            Volunteer::where('user_id', $volunteer->id)->firstOrFail()->update(['points' => $points]);
            Volunteer_history_point::create([
                'volunteer_id' => $volunteer->id,
                'reason' => 6,
                'prize_id' => $prize->id,
                'coordinator_id' => Auth::id(),
                'points' => 0 - $prize->points,
            ]);
        } else {
            Volunteer_history_point::create([
                'volunteer_id' => $volunteer->id,
                'reason' => 6,
                'prize_id' => $prize->id,
                'coordinator_id' => Auth::id(),
                'points' => 0,
            ]);
        }

        Prize_order_status::create([
            'order_id' => $order->id,
            'condition' => 0,
        ]);

        return redirect()->route('c.prize.order', $order->ivid)->with(['create_order' => true]);
    }

    public function destroy($id)
    {
        Prize_order::where('ivid', $id)->delete();
        return redirect()->route('c.prize.orders')->with(['delete_order' => true]);
    }

    public function order_confirmation($id)
    {
        $order = Prize_order::where('ivid', $id)->with(['volunteer', 'prize', 'combination'])->firstOrFail();
        if($order->prize->with_combinations == 1) $combination = $order->combination->translate->title; else $combination = "Nagroda nie posiada kombinacji";
        $pdf = new TCPDF();
        $pdf::SetTitle('Zamówienie nr. '.$order->id);
        $pdf::AddPage("P");
        $lg['a_meta_charset'] = 'UTF-8';
        $pdf::setLanguageArray($lg);
        $pdf::SetFont('latolatin', '', 12, '', true);
        $pdf::Image(url('/img/herb.png'), '', '20', '', 17, 'PNG');
        $pdf::Image(url('/img/logowmr.png'), '', '', '', 40, 'PNG', '', '', false, 300, 'C', false, false, 1, false, false, false);
        $pdf::Image(url('/img/logomosir.png'), '', '20', '', 13, 'PNG', '', '', false, 300, 'R', false, false, 1, false, false, false);
        $html1 = '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
        <h1 style="text-align:center;">Potwierdzenie zamówienia nagrody</h1>
        <p></p><p></p><p></p>
        <table style="width: 100%">
        <tr>
            <th style="font-weight: bold;">Zamawiający</th>
            <th style="text-align:right; font-weight: bold;">Szczegóły zamówienia</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
          </tr>
        <tr>
            <td>'.$order->volunteer->firstname.' '.$order->volunteer->lastname.'</td>
            <td style="text-align:right;">Nr. zamówienia: #'.$order->id.'</td>
          </tr>
          <tr>
              <td>'.$order->volunteer->name.'</td>
              <td style="text-align:right;">Data zamówienia: '.date("d.m.Y", strtotime($order->created_at)).'r.</td>
          </tr>
          <tr>
              <td>'.$order->volunteer->volunteer->street.' '.$order->volunteer->volunteer->house_number.', '.$order->volunteer->volunteer->city.'</td>
              <td style="text-align:right;">Wart. pkt. zamówienia: '.$order->prize->points.'</td>
        </tr>
        <tr>
            <td>tel. '.$order->volunteer->telephone.'</td>
        </tr>
    </table>
    <p></p><p></p><p></p><p></p>
    <table style="width: 100%; font-size:11px;">
        <tr>
            <td style="border: 1px solid #000; text-align:center; font-weight: bold;">L.p</td>
            <td style="border: 1px solid #000; text-align:center; font-weight: bold;">Nazwa nagrody</td>
            <td style="border: 1px solid #000; text-align:center; font-weight: bold;">Kategoria</td>
            <td style="border: 1px solid #000; text-align:center; font-weight: bold;">Wybrana kombinacja</td>
            <td style="border: 1px solid #000; text-align:center; font-weight: bold;">Wartość punktowa</td>
        </tr>

        <tr>
            <td style="border: 1px solid #000; text-align:center;">1.</td>
            <td style="border: 1px solid #000; text-align:center;">'.$order->prize->prize_translate->title.'</td>
            <td style="border: 1px solid #000; text-align:center;">'.$order->prize->category->prize_category_translate->name.'</td>
            <td style="border: 1px solid #000; text-align:center;">'.$combination.'</td>
            <td style="border: 1px solid #000; text-align:center;">'.$order->prize->points.'</td>
        </tr>
    </table>
    <p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>
    <p style="text-align:center; font-size:8px;">Unikalny numer zamówienia: '.$order->ivid.'</p>
    ';
        $pdf::writeHTML($html1, true, false, true, false, '');

        $pdf::Output('Zamówienie_'.$order->id.'.pdf');
    }

    public function change_status(Request $request, $id)
    {
        $validated = $request->validate(['status' => 'required|max:1']);
        $order = Prize_order::where('ivid', $id)->firstOrFail();
        Prize_order_status::create([
            'order_id' => $order->id,
            'condition' => $validated['status'],
        ]);
        return back()->with(['change_status' => true]);
    }
}
