@extends('glpi.layout', ['title_page' => 'Listar Registros Controle TI'])

@section('content')
    <h1>Editar Controle TI &dash; ID#{{ $controleTi->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger mt-4 box-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('controle-ti.update', $controleTi->id) }}" method="POST" class="mt-5">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="id_ticket" class="form-label">ID Ticket:</label>
                <div class="text-glpi">{{ $controleTi->id_ticket }}</div>
            </div>
            <div class="col-md-8">
                <label for="name" class="form-label">Nome:</label>
                <div class="text-glpi">{{ $controleTi->name }}</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="date_creation" class="form-label">Data de Criação:</label>
                <div class="text-glpi">{{ $controleTi->date_creation->format('d/m/Y H:i:s') }}</div>
            </div>
            <div class="col-md-4">
                <label for="date_mod" class="form-label">Data de Modificação:</label>
                <div class="text-glpi">{{ $controleTi->date_mod->format('d/m/Y H:i:s') }}</div>
            </div>
            <div class="col-md-4">
                <label for="note" class="form-label">Note:</label>
                <div class="text-glpi">{{ $controleTi->note }}</div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="proj" class="form-label">Projeto</label>
                <input type="text" class="form-control" id="proj" name="proj"
                    value="{{ old('proj', $controleTi->proj) }}">
            </div>
            <div class="col-md-6">
                <label for="jira" class="form-label">Jira</label>
                <input type="text" class="form-control" id="jira" name="jira"
                    value="{{ old('jira', $controleTi->jira) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="priority_order" class="form-label">Priority Order</label>
                <input type="number" class="form-control" id="priority_order" name="priority_order"
                    value="{{ old('priority_order', $controleTi->priority_order) }}">
            </div>
            <div class="col-md-6">
                <label for="priority_number" class="form-label">Priority Number</label>
                <input type="number" step="0.000001" class="form-control" id="priority_number" name="priority_number"
                    value="{{ old('priority_number', $controleTi->priority_number) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection

@section('asset_css')
    <style>
        label.form-label {
            font-weight: bold;
        }

        .box-errors ul li {
            list-style: none;
        }
    </style>
@endsection

@section('asset_js')
    <script type="text/javascript">
        var csrfTokenIndex = `{{ csrf_token() }}`;
    </script>
@endsection
