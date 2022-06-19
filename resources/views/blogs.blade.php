<x-blogs>

    @section('content')

        @foreach($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('blog', $post->slug)}}">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h3 class="post-subtitle">{{$post->short_description}}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="{{route('profile', $post->user_id)}}"><span>{{App\Models\User::findOrFail($post->user_id)->name}}</span></a>
                    {{$post->created_at->diffForHumans()}}u
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />

        @endforeach
            {{$posts->links()}}
            <br><br>
    @endsection

</x-blogs>
