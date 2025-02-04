<form method="GET" action="{{ route('controle-ti.index') }}" class="mb-4">
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="date_creation_ini" class="form-label">Data Criação</label>

            <div class="input-group">
                <span class="input-group-text">De</span>
                <input type="date" class="form-control" id="date_creation_ini" name="date_creation_ini"
                    value="{{ request('date_creation_ini', now()->subMonths(2)->format('Y-m-d')) }}">

                <span class="input-group-text">Até</span>
                <input type="date" class="form-control" id="date_creation_end" name="date_creation_end"
                    value="{{ request('date_creation_end', now()->format('Y-m-d')) }}">
            </div>
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
            <label for="jira" class="form-label">Jira</label>
            <input type="text" class="form-control" id="jira" name="jira" value="{{ request('jira') }}">
        </div>
        <div class="col-md-4">
            <label for="proj" class="form-label">Projeto</label>
            <input type="text" class="form-control" id="proj" name="proj" value="{{ request('proj') }}">
        </div>
        <div class="col-md-4">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ request('name') }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-lg px-4">Buscar</button>
        </div>
    </div>
</form>
