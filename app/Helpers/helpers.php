<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('show_agreement_date')){
    function show_agreement_date()
    {
        $currentDate = date_create(date('d-m-Y'));
        $agreementDate = date_create(Auth::user()->agreement_date);
        $difference = date_diff($currentDate, $agreementDate);
        $date = [
            'pl' => [
                'day' => 'dzień',
                'days1' => 'dni',
                'days2' => 'dni',
                'week' => 'tydzień',
                'weeks1' => 'tygodnie',
                'weeks2' => 'tygodni',
                'month' => 'miesiąc',
                'months1' => 'miesiące',
                'months2' => 'miesięcy',
                'year' => 'rok',
                'years1' => 'lata',
                'years2' => 'lat',
            ],
            'en' => [
                'day' => 'day',
                'days1' => 'days',
                'days2' => 'days',
                'week' => 'week',
                'weeks1' => 'weeks',
                'weeks2' => 'weeks',
                'month' => 'month',
                'month1' => 'months',
                'month2' => 'month',
                'year' => 'year',
                'years1' => 'years',
                'years2' => 'years',
            ],
            'uk' => [
                'day' => 'день',
                'days1' => 'дні',
                'days2' => 'днів',
                'week' => 'тиждень',
                'weeks1' => 'тижні',
                'weeks2' => 'тижнів',
                'month' => 'місяць',
                'month1' => 'місяці',
                'month2' => 'місяців',
                'year' => 'рік',
                'years1' => 'роки',
                'years2' => 'років',
            ],
        ];

        if($difference->y > 0)
        {
            if($difference->y >= 5)
            {
                $string = $difference->y." ".$date[session('locale')]['years2'];
            }elseif($difference->y > 1 && $difference->y < 5){
                $string = $difference->y." ".$date[session('locale')]['years1'];
            } else {
                $string = $difference->y." ".$date[session('locale')]['year'];
            }
        }elseif($difference->m > 0) {
            if($difference->m >= 5)
            {
                $string = $difference->m." ".$date[session('locale')]['months2'];
            }elseif($difference->m > 1 && $difference->m < 5){
                $string = $difference->m." ".$date[session('locale')]['months1'];
            } else {
                $string = $difference->m." ".$date[session('locale')]['month'];
            }
        } else {
            if($difference->d >= 5 || $difference->d == 0)
            {
                $string = $difference->d." ".$date[session('locale')]['days2'];
            } elseif($difference->d > 1 && $difference->d < 5){
                $string = $difference->d." ".$date[session('locale')]['days1'];
            } else {
                $string = $difference->d." ".$date[session('locale')]['day'];
            }
        }

        return $string;
    }
}
