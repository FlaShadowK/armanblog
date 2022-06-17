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
                    <a href="{{route('about')}}">{{App\Models\User::findOrFail($post->user_id)->name}}</a>
{{--                    <span>{{App\Models\User::findOrFail($post->user_id)->name}}</span>--}}
                    {{$post->created_at->diffForHumans()}}u
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />

        @endforeach
            {{$posts->links()}}

{{--                <ul class="pagnation">--}}
{{--                    <!-- a Tag for previous page -->--}}
{{--                    <li class="pag-li"><a class="pag-a" href="{{$posts->previousPageUrl()}}">--}}
{{--                        <!-- You can insert logo or text here --><--}}
{{--                    </a></li>--}}
{{--                    @for($i=1;$i<=$posts->lastPage();$i++)--}}
{{--                        <!-- a Tag for another page -->--}}
{{--                        <li class="pag-li"><a class="pag-a" href="{{$posts->url($i)}}">{{$i}}</a></li>--}}
{{--                    @endfor--}}
{{--                    <!-- a Tag for next page -->--}}
{{--                    <li class="pag-li"><a class="pag-a" href="{{$posts->nextPageUrl()}}">--}}
{{--                        <!-- You can insert logo or text here -->>--}}
{{--                    </a></li>--}}
{{--                </ul>--}}

            <br><br>
    @endsection

</x-blogs>
