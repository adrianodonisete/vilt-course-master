<tr>
    <td>
        <a href="{{ route('controle-ti.edit', $item->id) }}" class="btn btn-primary" target="_blank">
            Editar
        </a>
    </td>
    <td>{{ $item->id }}</td>
    <td>
        <a href="https://helpdesk.systax.net/glpi/front/ticket.form.php?id={{ $item->id_ticket }}" class="link-glpi"
            target="_blank">
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
