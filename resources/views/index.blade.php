<x-index>

    @section('content')
        @php
            $i = 0;
        @endphp
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
{{--                        <span>{{App\Models\User::findOrFail($post->user_id)->name}}</span>--}}
                        {{$post->created_at->diffForHumans()}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />

            @php
                $i++;
                if($i == 2){
                    break;
                }
            @endphp

        @endforeach

    @endsection
</x-index>
