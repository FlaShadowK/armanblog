<x-admin-master>

    @section('naslov')
        <strong>Edit your posts</strong>
    @endsection
        @section('content')

            <form action="{{route('a-update', $value->id)}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$value->title}}">
                <br>
                <label for="short_description">Short description:</label>
                <input type="text" name="short_description" id="short_description" class="form-control" value="{{$value->short_description}}">
                <br>
                <label for="picture">Picture</label>
                <img src="{{asset($value->picture)}}" style="max-width: 100%" alt="">
                <input type="file" name="picture" id="picture" class="form-control-file">
                <br>
                <label for="myeditorinstance">Content:</label>
                <textarea id="myeditorinstance" name="content">{{$value->content}}</textarea>
                <hr>
                <button type="submit" class="btn btn-info">Create</button>

            </form>

        @endsection

</x-admin-master>
