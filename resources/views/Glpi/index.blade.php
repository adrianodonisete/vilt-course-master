@extends('glpi.layout', ['title_page' => 'Listar Registros Controle TI'])

@section('content')
    <h1>Controle TI</h1>

    @session('error')
        <div class="alert alert-danger">
            {{ $value }}
        </div>
    @endsession

    @session('success')
        <div class="alert alert-success">
            {{ $value }}
        </div>
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
                <tr>
                    <td>
                        <a href="{{ route('controle-ti.edit', $item->id) }}" class="btn btn-primary" target="_blank">
                            Editar
                        </a>
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="https://helpdesk.systax.net/glpi/front/ticket.form.php?id={{ $item->id_ticket }}"
                            class="link-glpi" target="_blank">
                            {{ $item->id_ticket }}
                        </a>
                    </td>
                    <td>{{ $item->jira }}</td>
                    <td>{{ $item->proj }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date_creation)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date_mod)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $item->priority_number }}</td>
                </tr>
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
