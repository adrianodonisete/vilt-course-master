@extends('layouts.base', ['title_page' => 'Cadastrar EAN'])


@section('content')
    <div class="w-1/2 border border-gray-900">
        <form action="{{ route('cean.store') }}" method="POST">
            @csrf
            <div class="dv-group-form">
                <label for="ean" class="label">EAN</label>
                <input type="text" name="ean" id="ean" value="{{ old('ean') }}" class="input">

                @if ($errors->has('ean'))
                    <div class="input-error">
                        {{ $errors->first('ean') }}
                    </div>
                @endif
            </div>
            <div class="dv-group-form">
                @php
                    $active = is_numeric(old('active')) && old('active') == 0 ? 0 : 1;
                @endphp
                <label for="active1" class="label">Sim</label>
                <input type="radio" name="active" id="active1" value="1" @checked($active == 1)>

                <label for="active0" class="label">Não</label>
                <input type="radio" name="active" id="active0" value="0" @checked($active == 0)>

                @if ($errors->has('active'))
                    <div class="input-error">
                        {{ $errors->first('active') }}
                    </div>
                @endif
            </div>
            <div class="dv-group-form">
                <button type="submit" class="btn-primary">Salvar</button>
            </div>
        </form>
    </div>
    <br>
@endsection
