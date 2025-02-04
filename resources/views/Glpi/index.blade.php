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

    <form method="GET" action="{{ route('controle-ti.index') }}" class="mb-4">
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="date_creation_ini" class="form-label">Data Criação De</label>
                <input type="date" class="form-control" id="date_creation_ini" name="date_creation_ini"
                    value="{{ request('date_creation_ini', now()->subMonths(2)->format('Y-m-d')) }}">
            </div>
            <div class="col-md-3">
                <label for="date_creation_end" class="form-label">Data Criação Até</label>
                <input type="date" class="form-control" id="date_creation_end" name="date_creation_end"
                    value="{{ request('date_creation_end', now()->format('Y-m-d')) }}">
            </div>
            <div class="col-md-3">
                <label for="id" class="form-label">ID Controle TI</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ request('id') }}">
            </div>
            <div class="col-md-3">
                <label for="id_ticket" class="form-label">ID Ticket/GLPI</label>
                <input type="text" class="form-control" id="id_ticket" name="id_ticket"
                    value="{{ request('id_ticket') }}">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ request('name') }}">
            </div>
            <div class="col-md-4">
                <label for="proj" class="form-label">Projeto</label>
                <input type="text" class="form-control" id="proj" name="proj" value="{{ request('proj') }}">
            </div>
            <div class="col-md-4">
                <label for="jira" class="form-label">Jira</label>
                <input type="text" class="form-control" id="jira" name="jira" value="{{ request('jira') }}">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-lg px-4">Buscar</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>GLPI</th>
                <th>Jira</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Data de Modificação</th>
                <th>Note</th>
                <th>Projeto</th>
                <th>Priority Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
                <tr>
                    <td>
                        <a href="{{ route('controle-ti.show', $item->id) }}" class="btn btn-link" target="_blank">
                            Mostrar
                        </a>

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
                    <td>{{ $item->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date_creation)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date_mod)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $item->note }}</td>
                    <td>{{ $item->proj }}</td>
                    <td>{{ $item->priority_number }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="12">
                    {{-- pagination::bootstrap-5 --}}
                    {{ $paginator->links('glpi.links-b5') }}
                </td>
            </tr>
        </tfoot>
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
