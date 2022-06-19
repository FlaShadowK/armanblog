<x-admin-master>
    @section('naslov')
        <strong>Admin panel</strong>
    @endsection

    @section('content')
            @if (session('cmessage'))
                <div class="alert alert-success">
                    {{ Session::get('cmessage') }}
                </div>
            @endif
        <h1><--- Izaberite opciju</h1>
    @endsection
</x-admin-master>
