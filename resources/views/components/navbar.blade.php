<ul class="navbar-nav ms-auto py-4 py-lg-0">
    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('index')}}">Pocetna</a></li>
    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('blogs')}}">Blogovi</a></li>
    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('contact')}}">Kontakt</a></li>
    @if(Auth::user())
        @if(auth()->user()->admin == 1)
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('s-index')}}">Admin</a></li>
            @else
            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('a-index')}}">Admin</a></li>
        @endif
    @else
        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/login">Login</a></li>
        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="/register">Register</a></li>
    @endif
</ul>
