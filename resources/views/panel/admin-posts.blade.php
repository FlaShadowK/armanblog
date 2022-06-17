<x-admin-master>

    @section('naslov')
        <strong>Edit your posts</strong>
        @if (session('d-message'))
            <div class="alert alert-danger">
            {{ Session::get('d-message') }}
        </div>
        @endif
    @endsection
    @section('content')
        <table class="table-bordered table-valign-middle table-striped" style="width: 100%;">
            <tr style="background: #263238;">
                <th style="color: white"><h5><strong>Title</strong></h5></th>
                <th style="color: white"><h5><strong>Picture</strong></h5></th>
                <th style="color: white"><h5><strong>Short Description</strong></h5></th>
                <th style="color: white"><h5><strong>Content</strong></h5></th>
                <th style="color: white"><h5><strong>Posted At</strong></h5></th>
                <th style="color: white"><h5><strong>Action</strong></h5></th>
            </tr>
            @foreach($posts as $post)
            <tr>

                <td>{{$post->title}}</td>
                <td><img src="{{asset($post->picture)}}" style="max-width: 350px ;"></td>
                <td>{{$post->short_description}}</td>
                <td>{!! substr($post->content, 0, 150) !!}</td>
                <td>{{$post->created_at}}</td>
                <td><a href="{{route('a-edit', $post->slug)}}"><button style="width: 100%;" class="btn btn-info" type="button">Edit</button></a>
                    <hr>
                    <form method="post" action="{{route('a-destroy', $post->id)}}">
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
