@extends('glpi.layout', ['title_page' => 'Listar Registros Controle TI'])

@section('content')
    <h1>Controle TI List</h1>

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
