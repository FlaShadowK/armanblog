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

            {!! $post->content !!}
            <br>
            <hr>
            <span class="meta">
            Posted by
            <a href="{{route('about')}}">Arman Omerovic</a>
             {{$post->created_at->diffForHumans()}}
        </span>

    @endsection

</x-post>
