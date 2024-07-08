@extends('layouts.base', ['title_page' => 'Lista EANs'])

@section('content')
    @session('message')
        <h3>{{ $value }}</h3>
    @endsession

    <div>
        <p>Conteúdo tela - ListaEANs</p>
        <ul>
            @foreach ($eans as $ean)
                <li>{{ $ean }}</li>
            @endforeach
        </ul>
    </div>
@endsection
