<?php

namespace App\Http\Controllers\volunteer;

use App\Models\User;
use App\Models\Prize;
use App\Mail\NewOrder;
use App\Models\Volunteer;
use App\Models\Prize_order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Validation\Rule;
use App\Models\Prize_combination;
use App\Models\Prize_order_status;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VPrizesController extends Controller
{
    public function index()
    {
        $prizes = Prize::with('prize_translate', 'category')->get();
        return view('volunteer.prizes.index', ['prizes' => $prizes]);
    }

    public function show($id)
    {
        $prize = Prize::where('ivid', $id)->with('prize_translate', 'category', 'combinations')->firstOrFail();
        $points = Volunteer::where('user_id', Auth::id())->pluck('points')->firstOrFail();
        return view('volunteer.prizes.show', ['prize' => $prize, 'points' => $points]);
    }

    public function store(Request $request, $id)
    {
        $prize = Prize::where('ivid', $id)->firstOrFail();
        if($prize->with_combinations == 1) $v = true;
        else $v = false;
        $validated = $request->validate([
            'info' => 'nullable|max:255',
            'combination' => Rule::requiredIf($v),
        ]);
        $volunteer = Volunteer::where('user_id', Auth::id())->firstOrFail();

        if ($volunteer->points >= $prize->points)
        {
            if($prize->with_combinations == 1) $combination = Prize_combination::where('ivid', $validated['combination'])->firstOrFail();
            $order = Prize_order::create([
                'ivid' => Str::uuid(),
                'volunteer_id' => Auth::id(),
                'prize_id' => $prize->id,
                'combination_id' => ($prize->with_combinations == 0)? null : $combination->id,
                'info' => $validated['info'],
                'prize_points' => $prize->points,
                'volunteer_points' => $volunteer->points,
                'condition' => 0,
            ]);

            Prize_order_status::create([
                'order_id' => $order->id,
                'condition' => 0,
            ]);

            if($prize->with_combinations == 0)
                $prize->update(['quantity' => $prize->quantity - 1]);
            else
                $combination->update(['quantity' => $combination->quantity - 1]);

            $volunteer->update(['points' => $volunteer->points - $order->prize_points]);
            $datam = array(
                'name' => 'test',
                'link' => route('c.prize.order', [$order->id]),
            );

            Mail::to(User::where('role', 'coordinator')->get()->pluck('email'))->send(new NewOrder($datam));

            return redirect()->route('v.prize.order', [$order->ivid])->with(['order' => true]);
        } else {
            return back()->with(['points_order' => false]);
        }
    }

    public function orders()
    {
        $orders = Prize_order::where('volunteer_id', Auth::id())->with('prize')->orderBy('id', 'DESC')->get();
        return view('volunteer.prizes.orders', ['orders' => $orders]);
    }

    public function order($id)
    {
        $order = Prize_order::where('ivid', $id)->where('volunteer_id', Auth::id())->with('prize', 'combination', 'status')->firstOrFail();
        return view('volunteer.prizes.order', ['order' => $order]);
    }

    public function order_confirmation($id)
    {
        $order = Prize_order::where('ivid', $id)->where('volunteer_id', Auth::id())->with(['volunteer', 'prize', 'combination'])->firstOrFail();
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
            <td style="text-align:right;">Nr zamówienia: #'.$order->id.'</td>
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

}
