<div>
    <table style="width:100%">
        <tr>
            <td style="width:10%">
                <h4>HTTP Method</h4>
            </td>
            <td style="width:10%">
                <h4>Route</h4>
            </td>
            <td style="width:10%">
                <h4>Name</h4>
            </td>
            <td style="width:60%">
                <h4>Action</h4>
            </td>
            <td style="width:10%">
                <h4>Link</h4>
            </td>
        </tr>
        @foreach ($routes as $route)
            <tr>
                <td>{{ $route['method'] }}</td>
                <td>{{ $route['uri'] }}</td>
                <td>{{ $route['name'] }}</td>
                <td>{{ $route['action'] }}</td>
                <td>
                    {{ $route['uri'] }}
                </td>
            </tr>
        @endforeach
    </table>
</div>
