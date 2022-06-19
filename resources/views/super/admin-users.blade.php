<x-admin-master>

    @section('naslov')
        <strong>All users</strong>
        @if (session('d-message'))
            <div class="alert alert-danger">
                {{ Session::get('d-message') }}
            </div>
        @endif
    @endsection
    @section('content')
        @if(Session::has('cmessage'))
            <p class="alert alert-success">{{ Session::get('cmessage') }}</p>
        @endif
        @if(Session::has('dmessage'))
            <p class="alert alert-danger">{{ Session::get('dmessage') }}</p>
        @endif
        <table class="table-bordered table-valign-middle table-striped" style="width: 100%;">
            <tr style="background: #263238;">
                <th style="color: white"><h5><strong>Name</strong></h5></th>
                <th style="color: white"><h5><strong>ID</strong></h5></th>
                <th style="color: white"><h5><strong>Picture</strong></h5></th>
                <th style="color: white"><h5><strong>About</strong></h5></th>
                <th style="color: white"><h5><strong>Action</strong></h5></th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->id}}</td>
                    <td><img src="{{$user->picture}}" alt="" height="80px"></td>
                    <td>{{$user->about}}</td>
                    <td><a href="{{route('s-users-posts', $user->id)}}"><button type="button" class="btn btn-info"  style="padding: 0; width: 100%;">Posts</button></a>
                        <form method="post" action="{{route('s-user-destroy', $user->id)}}">
                            @csrf
                            {{ method_field('delete')}}
                            <button class="btn btn-danger" style="padding: 0; width: 100%;" type="submit" @if(auth()->user()->id == $user->id)disabled @endif>Delete</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endsection

</x-admin-master>
