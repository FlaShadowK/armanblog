<x-admin-master>

    @section('naslov')
        <strong>Izmjena "O meni" strane</strong>
    @endsection

    @section('content')
            <form action="{{route('a-update-about')}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <label for="picture">Your picture:</label>
                <input type="file" class="form-control-file" name="picture">
                <img src="{{asset($picture)}}" style="max-width: 40%; border-radius: 10px; border: dashed; border-width: 1px;" alt="">
                <br><br>
                <label for="myeditorinstance">Sadrzaj:</label>
                <textarea id="myeditorinstance" name="about">{{$about}}</textarea>
                <hr>
                <div style="margin-bottom:10px;">
                    <button type="submit" class="btn btn-info" style="width: 30%;">Izmjenite</button>
                    <a href="{{route('a-posts')}}"><button class="btn btn-outline-primary" type="button" style="width: 10%;">Nazad</button></a>
                </div>
            </form>
    @endsection

</x-admin-master>
