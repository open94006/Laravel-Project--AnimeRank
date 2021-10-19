<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - AnimeRank</title>
    <link rel="shortcut icon" href={{ URL::asset("images/ranking.ico") }} type="image/x-icon" />
    @include('partials.meta')
    @include('partials.css')
</head>

<body>
    <div class="fh5co-loader"></div>
    <div class="loadingdiv" id="loading" style="display:none">
        <img src={{ URL::asset("images/loading.jpg") }} />
    </div>
    <div id="page">
        @include('partials.nav')
        <div class="container">
            @yield('container')
        </div>
        @include('partials.footer')
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>

    @include('partials.js')
</body>


</html>