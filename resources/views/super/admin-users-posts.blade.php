<x-admin-master>

    @section('naslov')
        <strong>{{$user->name}}'s posts</strong>
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
                <th style="color: white"><h5><strong>Title</strong></h5></th>
                <th style="color: white"><h5><strong>Picture</strong></h5></th>
                <th style="color: white;"><h5><strong>Short Description</strong></h5></th>
                <th style="color: white"><h5><strong>Content</strong></h5></th>
                <th style="color: white"><h5><strong>Other</strong></h5></th>
                <th style="color: white"><h5><strong>Action</strong></h5></th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td><img src="{{asset($post->picture)}}" style="max-height: 250px;"></td>
                    <td>{{$post->short_description}}</td>
                    <td><div style="overflow: scroll; overflow-wrap: break-word; max-width: 500px; height: 250px; margin: 0; padding: 0;">{!! $post->content !!}</div></td>
                    <td>
                        Created at: <br>
                        {{$post->created_at}}
                        <hr>
                        Updated at: <br>
                        {{$post->updated_at}}
                    </td>
                    <td>

                        <a href="{{route('blog', $post->slug)}}"><button style="width: 100%;" class="btn btn-success" type="button">Show</button></a>
                        <hr>
                        <a href="{{route('s-edit', $post->id)}}"><button style="width: 100%;" class="btn btn-info" type="button">Edit</button></a>
                        <hr>
                        <form method="post" action="{{route('s-destroy', $post->id)}}">
                            @csrf
                            {{ method_field('delete')}}
                            <button class="btn btn-danger" style="width: 100%;" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endsection

</x-admin-master>
