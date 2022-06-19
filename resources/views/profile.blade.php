<x-profile>

    @section('header')
        <header class="masthead" style="background-image:  url({{asset($user->picture)}})">
            <div class="container position-relative px-4 px-lg-5">
            <img src="{{asset($user->picture)}}" alt="" style="height: 300px; width: 300px; border-radius: 150px;">
            <br>
            <h1 style="color: white; position: absolute; left: 30%; bottom: 38%"><strong>{{$user->name}}</strong></h1>
            </div>
        </header>
    @endsection

    @section('content')
            <h1>About me</h1>

            {!! $user->about !!}

            <hr style="height: 7px; width: 100%;">
        @foreach($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('blog', $post->slug)}}">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h3 class="post-subtitle">{{$post->short_description}}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <span>{{App\Models\User::findOrFail($post->user_id)->name}}</span>
                    {{$post->created_at->diffForHumans()}}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />

        @endforeach
{{--        {{$posts->links()}}--}}
        <br><br>
    @endsection

</x-profile>
