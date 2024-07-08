<nav>
    <div>
        <a href="{{ route('cean.show') }}">Cean</a> -
        <a href="{{ route('cean.create') }}">Cean Criar</a>
    </div>
    <div>
        <a href="{{ route('page.home') }}">Home</a> -
        <a href="{{ route('page.admin', ['table' => 'regras']) }}">Admin Regras</a> -
        <a href="{{ route('page.erp') }}">Admin ERP</a> -
        <a href="{{ route('cean.show') }}">Lista EANs</a>
    </div>
</nav>
