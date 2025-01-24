<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle TI</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
                    <th>Ticket ID</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Note</th>
                    <th>Project</th>
                    <th>Jira</th>
                    <th>Area</th>
                    <th>Status</th>
                    <th>Priority Order</th>
                    <th>Priority Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($controle_ti as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->id_ticket }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->date_creation }}</td>
                        <td>{{ $item->date_mod }}</td>
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
        </table>
    </div>

    <footer class="bg-light text-center py-3 mt-5">
        <p>Controle TI &copy; {{ date('Y') }}</p>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
