<x-admin-master>

    @section('naslov')
        <strong>Izmijenite vas post</strong>
    @endsection
        @section('content')

            <form action="{{route('s-update',$id)}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$value->title}}">
                <br>
                <label for="short_description">Short description:</label>
                <input type="text" name="short_description" id="short_description" class="form-control" value="{{$value->short_description}}">
                <br>
                <label for="picture">Picture:</label>
                <input type="file" name="picture" id="picture" class="form-control-file" value="{{asset($value->picture)}}">
                <br>
                <img src="{{asset($value->picture)}}" style="max-width: 40%; border-radius: 10px; border: dashed; border-width: 1px;" alt="">
                <br><br>
                <label for="myeditorinstance">Content:</label>
                <textarea id="myeditorinstance" name="content">{{$value->content}}</textarea>
                <hr>
                <div style="margin-bottom:10px;">
                <button type="submit" class="btn btn-info" style="width: 30%;">Izmjenite</button>
                <a href="{{back()}}"><button class="btn btn-outline-primary" type="button" style="width: 10%;">Nazad</button></a>
                </div>
            </form>

        @endsection

</x-admin-master>
