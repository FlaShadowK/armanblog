<x-admin-master>

    @section('naslov')
        <strong>Izmijenite vas post</strong>
    @endsection
    @section('content')

        <form action="{{route('a-user-update',$value->id)}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <label for="picture">Picture:</label>
            <input type="file" name="picture" id="picture" class="form-control-file">
            <br>
            <img src="{{asset(auth()->user()->picture)}}" style="max-width: 40%; border-radius: 10px; border: dashed; border-width: 1px;" alt="">
            <br><br>
            <label for="myeditorinstance">About:</label>
            <textarea id="myeditorinstance" name="about">{!! $value->about !!}</textarea>
            <hr>
            <div style="margin-bottom:10px;">
                <button type="submit" class="btn btn-info" style="width: 30%;">Izmjenite</button>
                <a href="{{route('a-index')}}"><button class="btn btn-outline-primary" type="button" style="width: 10%;">Nazad</button></a>
            </div>
        </form>

    @endsection

</x-admin-master>
