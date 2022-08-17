@extends('mail.layout')

@section('title')
Wszystkiego najlepszego!
@endsection

@section('name')
{{ $datam['firstname'] }}
@endsection

@section('content')
Z okazji Twoich urodzin składamy Ci moc życzeń: uśmiechu, zdrowia, radości, siły oraz chęci niesienia pomocy, zaangażowania, mnóstwa prezentów i gości, przyjaźni wielkich i małych, wielu przygód niebywałych i uśmiechu wesołego i wszystkiego, wszystkiego najlepszego!
@endsection

@section('button-link')
{{ route('login') }}
@endsection

@section('button-text')
Zaloguj się do ISOW
@endsection

