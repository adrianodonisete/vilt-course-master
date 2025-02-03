<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle TI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Controle TI</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Create New ControleTI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
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
                    <th>Área</th>
                    <th>Status</th>
                    <th>Priority Order</th>
                    <th>Priority Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="https://helpdesk.systax.net/glpi/front/ticket.form.php?id={{ $item->id_ticket }}"
                                target="_blank">{{ $item->id_ticket }}</a>
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date_creation)->format('d/m/Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date_mod)->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $item->note }}</td>
                        <td>{{ $item->proj }}</td>
                        <td>{{ $item->jira }}</td>
                        <td>{{ $item->area }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->priority_order }}</td>
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
    </div>

    <footer class="bg-light text-center py-3 mt-5">
        <p>Controle TI &copy; {{ date('Y') }}</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
