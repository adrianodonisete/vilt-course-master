@extends('glpi.layout', ['title_page' => 'Listar Registros Controle TI'])

@section('content')
    <h1>Controle TI List</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Ticket</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Data de Modificação</th>
                <th>Note</th>
                <th>Projeto</th>
                <th>Jira</th>
                <th>Priority Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="https://helpdesk.systax.net/glpi/front/ticket.form.php?id={{ $item->id_ticket }}"
                            class="link-glpi" target="_blank">
                            {{ $item->id_ticket }}
                        </a>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date_creation)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date_mod)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $item->note }}</td>
                    <td>{{ $item->proj }}</td>
                    <td>{{ $item->jira }}</td>
                    <td>{{ $item->priority_number }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="12">
                    {{ $paginator->links('pagination::bootstrap-5') }}
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
