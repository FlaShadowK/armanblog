<x-admin-master>

    @section('naslov')
        <strong>Create a blog post</strong>
    @endsection
    @section('content')

        <form action="{{route('a-store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control">
            <br>
            <label for="short_description">Short description:</label>
            <input type="text" name="short_description" id="short_description" class="form-control">
            <br>
            <label for="picture">Picture</label>
            <input type="file" name="picture" id="picture" class="form-control-file">
            <br>
            <label for="myeditorinstance">Content:</label>
            <textarea id="myeditorinstance" name="content"></textarea>
            <hr>
            <button type="submit" class="btn btn-info">Create</button>

        </form>

    @endsection

</x-admin-master>
