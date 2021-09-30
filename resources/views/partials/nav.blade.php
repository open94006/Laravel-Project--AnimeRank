<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="top-menu">
            <div class="row">
                <div class="col-sm-2">
                    <div id="fh5co-logo"><a href="{{ route('welcome') }}">AnimeRank<span>.</span></a></div>
                </div>
                <div class="col-sm-10 text-right menu-1">
                    <ul>
                        <li><a href="{{ route('rank.index') }}">排行榜</a></li>
                        <li><a href="{{ route('animeList.index') }}">動畫清單</a></li>
                        @if (session()->has('LoggedUserId'))
                        <li class="has-dropdown"><a>{{ session()->get('LoggedUserName') }}，你好！</a>
                            <ul class="dropdown">
                                <li><a href="">個人資料</a></li>
                                <li><a href="{{ route('auth.logout') }}">登出</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="active"><a href="{{ route('auth.login') }}">會員登入</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>