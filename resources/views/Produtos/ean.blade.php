@extends('layouts.base', ['title_page' => 'Lista EANs'])

@section('content')
    @session('message')
        <h3>{{ $value }}</h3>
    @endsession

    <div class="bg-gray-200 my-3">
        <strong>User Site</strong>
        <br>
        @isset($nivelSite)
            Nível Site: {{ $nivelSite }}
        @endisset
    </div>

    <div class="bg-gray-200 my-3">
        <strong>Níveis</strong>
        <br>
        @isset($niveisAll)
            @php
                echo '<pre>', print_r($niveisAll, true), '</pre>';
            @endphp
        @endisset
    </div>

    <div>
        <p>Conteúdo tela - ListaEANs x</p>
        <ul>
            @foreach ($eans as $ean)
                <li>{{ $ean }}</li>
            @endforeach
        </ul>
    </div>
@endsection
