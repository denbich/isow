@extends('mail.layout')

@section('title')
Kod do aktywacji wierzytelniania dwuskładnikowego
@endsection

@section('name')
wolontariuszu
@endsection

@section('content')
Kod do aktywowania uwierzytelniania dwuskładnikowego to:
<br><br> <b style="text-align: center;">{{ $datam['code'] }}</b> <br><br>
Kod ważny jest 20 minut i nie ujawniaj go nikomu. Jeśli nie próbowałeś włączyć uwierzytelniania dwuskładnikowego, niezwłocznie skontaktuj się z administratorem
@endsection

@section('button-link') mailto:administrator@wolontariat.rybnik.pl @endsection

@section('button-text') Kontakt z administratorem @endsection

