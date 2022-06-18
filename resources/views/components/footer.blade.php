<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/elonmusk" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://steamcommunity.com/profiles/76561199144391732/" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-steam fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/FlaShadowK" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://open.spotify.com/playlist/4O3URXzw4pkiyxn76UDQS1?si=7a29c47597544284" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-spotify fa-stack-1x fa-inverse"></i>
                                    </span>
                        </a>
                    </li>
                    @if(!auth()->user())
                    <li class="list-inline-item">
                        <a href="{{route('login')}}">
                            <button type="button" style="visibility: hidden;"></button>
                        </a>
                    </li>
                    @endif
                </ul>
                <div class="small text-center text-muted fst-italic">Copyright &copy; Arman Omerovic 2022</div>
            </div>
        </div>

    </div>
</footer>
