<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Pesel implements Rule
{

    public $gender;

    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    public function passes($attribute, $value)
    {
        $url = "https://h88.pl/sm/api/v1/pesel/verify/?pesel=".$value;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // DEBUG ONLY
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


        $resp = curl_exec($curl);
        curl_close($curl);
        $pesel = json_decode($resp)->method->methodData;

        if($pesel->has11Digits == true && $pesel->isCheckSumOk == true && $pesel->isBirthDateValid == true && $pesel->personSex == strtoupper($this->gender)) return true; else return false;

    }

    public function message()
    {
        return trans('validation.custom.pesel');
    }
}
