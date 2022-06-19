<x-post>

    @section('heading')

        <header class="masthead" style="background-image: url('{{asset($post->picture)}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{$post->title}}</h1>
                            <h2 class="subheading">{{$post->short_description}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    @endsection

    @section('content')

            <img src="{{asset($post->picture)}}" style="width:100%; border-radius: 10px;" alt="">

            {!! $post->content !!}
            <br>
            <hr>
            <span class="meta">
            Posted by
            <a href="{{route('profile', $post->user_id)}}"><span>{{App\Models\User::findOrFail($post->user_id)->name}}</span></a>
            {{$post->created_at->diffForHumans()}}
        </span>

    @endsection

</x-post>
