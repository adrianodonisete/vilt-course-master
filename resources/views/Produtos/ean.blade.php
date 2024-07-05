@extends('layouts.base', ['title_page' => 'Lista EANs'])

@section('content')
    <div>
        <p>Conteúdo tela - ListaEANs</p>
        <ul>
            @foreach ($eans as $ean)
                <li>{{ $ean }}</li>
            @endforeach
        </ul>
    </div>
@endsection
