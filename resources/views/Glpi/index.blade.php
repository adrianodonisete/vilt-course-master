@extends('glpi.layout', ['title_page' => 'Listar Registros Controle TI'])

@section('content')
    <h1>Controle TI</h1>

    @session('error')
        <x-alert type="danger" :message="$value" />
    @endsession

    @session('success')
        <x-alert type="success" :message="$value" />
    @endsession

    @include('glpi.includes.search')

    <div>
        {{-- pagination::bootstrap-5 --}}
        {{ $paginator->appends(request()->except('page'))->links('glpi.includes.links-b5') }}
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>GLPI</th>
                <th>Jira</th>
                <th>Projeto</th>
                <th>Nome</th>
                <th>Data Criação</th>
                <th>Dt Alteração</th>
                <th>Priority Number</th>
            </tr>
        </thead>
        <tbody>
            @php
                $result = $paginator->items();
            @endphp
            @foreach ($result as $item)
                <x-glpi.controle-ti-item :item="$item" />
            @endforeach
        </tbody>
    </table>
@endsection

@section('asset_css')
    <style>
        .link-glpi {
            color: cornflowerblue;
            text-decoration: none;
        }

        .link-glpi:hover {
            color: darkblue;
            text-decoration: underline;
        }
    </style>
@endsection

@section('asset_js')
    <script type="text/javascript">
        var csrfTokenIndex = `{{ csrf_token() }}`;
    </script>
@endsection
